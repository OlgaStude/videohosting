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
            $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->where('videos_id', '=', $req->video_id)
            ->select('comments.id', 'comments.user_id', 'comments.user_name', 'comments.text', 'comments.created_at', 'users.path')
            ->paginate(20);
            $view = view('components.comments', compact('comments'));
            return $view;
        } else {
            return redirect()->back();
        }
    }
}
