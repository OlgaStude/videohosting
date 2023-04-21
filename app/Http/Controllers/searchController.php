<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function searchCategoryUser(Request $req)
    {
        $videos = Video::where([
            ['users_id', '=', Auth::user()->id],
            ['category', '=', $req->search_word],
            ['restrictions', '<>', '3']
        ])->orderBy('likes_to_dislikes', 'desc')->get();
        return view('components.userVideos', compact('videos'));
    }

    public function searchCategoryAdmin(Request $req)
    {
        $videos = Video::where('category', '=', $req->search_word)->get();
        return view('components.adminVideos', compact('videos'));
    }
}
