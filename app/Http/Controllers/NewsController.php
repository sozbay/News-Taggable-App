<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use App\Models\TagName;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->get()->sortBy('id')->all();

        return view('news.news-list', ['news' => $news]);
    }

    public function create()
    {
        $tags = TagName::query()->get()->all();
        return view('news.news-add', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $news = new News();
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        $news->save();

        $newsId = $news->id;

        Tag::syncTag(News::class, $newsId, $request->get("tags"));

        return redirect()->back()->with('success', 'Haber Başarılı Bir Şekilde Eklendi!');
    }

    public function edit($id)
    {
        $news = News::query()->where('id', '=', $id)->with('taggable')->first();
        $tags = TagName::query()->get()->all();
        return view('news.news-edit', ['news' => $news, 'tags' => $tags]);
    }

    public function update(Request $request)
    {
        /** @var  $news News */
        $news = News::query()->where('id', '=', $request->get('newsId'))->first();
        $news->update([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);

        $news->taggable()->delete();

        if (!empty($request->get("tags"))) {
            Tag::syncTag(News::class, $request->get('newsId'), $request->get("tags"));
        }

        return redirect()->back()->with('success', 'Haber Başarılı Bir Şekilde Düzenlenmiştir!');
    }

    public function delete($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->back()->withErrors('Haber Bulunamadı');
        }

        $news->delete();

        return redirect()->back()->with('success', 'Haber Başarılı Bir Şekilde Silindi!');
    }
}
