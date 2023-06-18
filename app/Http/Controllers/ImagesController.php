<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use App\Models\TagName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::query()->get()->all();

        return view('images.images-list', ['images' => $images]);
    }

    public function create()
    {
        $tags = TagName::query()->get()->all();
        return view('images.image-add', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $image = new Image();
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:4048',

        ]);
        if ($request->image) {
            $imageName = time() . '-' . $request->image->getClientOriginalName();
            $path = public_path() . '/assets/img';
            File::makeDirectory($path, $mode = 0777, true, true);
            $request->image->move($path, $imageName);
        }
        $image->title = $request->get('title');
        $image->image = $imageName;
        $image->save();


        $imageId = $image->id;

        Tag::syncTag(Image::class, $imageId, $request->get("tags"));

        return redirect()->back()->with('success', 'Resim Başarılı Bir Şekilde Eklendi!');
    }

    public function edit($id)
    {
        $image = Image::query()->where('id', '=', $id)->with('taggable')->first();
        $tags = TagName::query()->get()->all();
        return view('images.image-edit', ['image' => $image, 'tags' => $tags]);
    }

    public function update(Request $request)
    {
        /** @var  $image Image */
        $image = Image::query()->where('id', '=', $request->get('imageId'))->first();
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:4048',

        ]);
        if ($request->image) {
            $imageName = time() . '-' . $request->image->getClientOriginalName();
            $path = public_path() . '/assets/img';
            File::makeDirectory($path, $mode = 0777, true, true);
            $request->image->move($path, $imageName);
            $image->update([
                'image' => $imageName
            ]);
        }
        $image->update([
            'title' => $request->get('title')
        ]);

        $image->taggable()->delete();

        if (!empty($request->get("tags"))) {
            Tag::syncTag(Image::class, $request->get('imageId'), $request->get("tags"));
        }

        return redirect()->back()->with('success', 'Resim Başarılı Bir Şekilde Düzenlenmiştir!');
    }

    public function delete($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return redirect()->back()->withErrors('Resim Bulunamadı');
        }

        $image->delete();

        return redirect()->back()->with('success', 'Resim Başarılı Bir Şekilde Silindi!');
    }
}
