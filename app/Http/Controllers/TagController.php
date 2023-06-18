<?php

namespace App\Http\Controllers;

use App\Models\TagName;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = TagName::query()->get()->all();

        return view('tags.tag-list', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tags.tag-add');
    }

    public function store(Request $request)
    {
        $tag = new TagName();
        $tag->name = $request->get('name');
        $tag->save();


        return redirect()->back()->with('success', 'Etiket Başarılı Bir Şekilde Eklendi!');
    }

    public function edit($id)
    {
        $tag = TagName::query()->where('id', '=', $id)->first();
        return view('tags.tag-edit', ['tag' => $tag]);
    }

    public function update(Request $request)
    {
        $news = TagName::query()->where('id', '=', $request->get('tagId'))->first();
        $news->update([
            'name' => $request->get('name')
        ]);

        return redirect()->back()->with('success', 'Etiket Başarılı Bir Şekilde Düzenlenmiştir!');
    }

    public function delete($id)
    {
        $news = TagName::find($id);

        if (!$news) {
            return redirect()->back()->withErrors('Etiket Bulunamadı');
        }

        $news->delete();

        return redirect()->back()->with('success', 'Etiket Başarılı Bir Şekilde Silindi!');
    }
}
