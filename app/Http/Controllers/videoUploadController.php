<?php

namespace App\Http\Controllers;

use App\Http\Requests\videoUploadRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class videoUploadController extends Controller
{
    public function upload(videoUploadRequest $req){
        $req->file('video')->store('public/videos');
        $video_name = $req->file('video')->hashName();
        Video::create(array_merge($req->validated(), ['users_id' => Auth::user()->id, 'path' => $video_name, 'likes' => 0, 'dislikes' => 0, 'restrictions' => 0]));
        $success_message = $req->session()->put('success_message', 'Отправка успешна!');
        return redirect()->back()->with($success_message);
    }
}
