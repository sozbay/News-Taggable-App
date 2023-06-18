<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\TagName;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::query()->get()->all();

        return view('videos.videos-list', ['videos' => $videos]);
    }

    public function create()
    {
        $tags = TagName::query()->get()->all();
        return view('videos.video-add', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $video = new Video();
        $request->validate([
            'video' => 'required|mimetypes:video/mp4,video/quicktime|max:10000',
        ]);
        if ($request->video) {
            $videoName = time() . '-' . $request->video->getClientOriginalName();
            $path = public_path() . '/assets/video';
            File::makeDirectory($path, $mode = 0777, true, true);
            $request->video->move($path, $videoName);
            $video->video = $videoName;
        }
        $video->title = $request->get('title');
        $video->save();


        $videoId = $video->id;

        Tag::syncTag(Video::class, $videoId, $request->get("tags"));

        return redirect()->back()->with('success', 'Video Başarılı Bir Şekilde Eklendi!');
    }

    public function edit($id)
    {
        $video = Video::query()->where('id', '=', $id)->with('taggable')->first();
        $tags = TagName::query()->get()->all();
        return view('videos.video-edit', ['video' => $video, 'tags' => $tags]);
    }

    public function update(Request $request)
    {
        /** @var  $video Video */
        $video = Video::query()->where('id', '=', $request->get('videoId'))->first();
        $request->validate([
            'video' => 'mimetypes:video/mp4,video/quicktime|max:10000',
        ]);
        if ($request->video) {
            $videoName = time() . '-' . $request->video->getClientOriginalName();
            $path = public_path() . '/assets/video';
            File::makeDirectory($path, $mode = 0777, true, true);
            $request->video->move($path, $videoName);
            $video->update([
                'video' => $videoName
            ]);
        }

        $video->update([
            'title' => $request->get('title')
        ]);
        $video->taggable()->delete();

        if (!empty($request->get("tags"))) {
            Tag::syncTag(Video::class, $request->get('videoId'), $request->get("tags"));
        }

        return redirect()->back()->with('success', 'Video Başarılı Bir Şekilde Düzenlenmiştir!');
    }

    public function delete($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return redirect()->back()->withErrors('Video Bulunamadı');
        }

        $video->delete();

        return redirect()->back()->with('success', 'Video Başarılı Bir Şekilde Silindi!');
    }
}
