<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class redirectController extends Controller
{
    public function index()
    {
        return redirect('login');
    }
    public function show($id, Request $req)
    {
        if (Auth::check()) {
            if (Auth::user()->id == $id) {
                if (User::where('id', '=', $id)->exists()) {
                    $owner_id = $id;
                    $videos = Video::where([
                        ['users_id', '=', Auth::user()->id],
                        ['restrictions', '<>', '3']
                    ])->orderBy('likes_to_dislikes', 'desc')->get();
                    return view('userpage', compact('owner_id', 'videos'));
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('mainpage');
        }
    }
}
