<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\News;
use App\Models\TagName;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $tagCount = TagName::query()->count();
        $newsCount = News::query()->count();
        $imageCount = Image::query()->count();
        $videoCount = Video::query()->count();

        return view('index', ['tagCount' => $tagCount, 'newsCount' => $newsCount, 'imageCount' => $imageCount, 'videoCount' => $videoCount]);
    }
}
