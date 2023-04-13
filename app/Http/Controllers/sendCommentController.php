<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sendCommentController extends Controller
{
    public function send(Request $req)
    {
        if (isset($req->video_id)) {
            Comment::create(['videos_id' => $req->video_id, 'user_name' => Auth::user()->nikname, 'user_id' => Auth::user()->id, 'text' => $req->text]);
            $comments = Comment::where('videos_id', '=', $req->video_id)->orderBy('id', 'desc')->get();
            return view('components.comments', compact('comments'));
        } else {
            return redirect()->back();
        }
    }
}
