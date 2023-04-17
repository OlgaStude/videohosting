<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $req)
    {
        $videos = Video::where([
            ['title', 'like', '%' . $req->search_word . '%'],
            ['restrictions', '=', 0]
        ])->get();
        return view('components.mainpagevideos', compact('videos'));
    }

    public function searchCategory(Request $req)
    {
        $videos = Video::where([
            ['category', '=', $req->search_word],
            ['restrictions', '=', 0]
        ])->get();
        return view('components.mainpagevideos', compact('videos'));
    }
}
