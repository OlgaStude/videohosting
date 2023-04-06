<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class raitingController extends Controller
{
    public function like(Request $req){
        $exists = Like::where([
            ['users_id', '=', Auth::user()->id],
            ['videos_id', '=', $req->id],
        ])->exists();
        if(!$exists){
            Video::where("id", $req->id)->increment("likes");
            Like::create(['users_id' => Auth::user()->id, 'videos_id' => $req->id]);
            $exists = Dislike::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $req->id],
            ])->exists();
            if($exists){
                Video::where("id", $req->id)->decrement("dislikes");
                Dislike::where([
                    ['users_id', '=', Auth::user()->id],
                    ['videos_id', '=', $req->id],
                ])->delete();
            }
            return true;
        }else{
            Video::where("id", $req->id)->decrement("likes");
            Like::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $req->id],
            ])->delete();
            return false;
        }
    }

    public function dislike(Request $req){
        $exists = Dislike::where([
            ['users_id', '=', Auth::user()->id],
            ['videos_id', '=', $req->id],
        ])->exists();
        if(!$exists){
            Video::where("id", $req->id)->increment("dislikes");
            Dislike::create(['users_id' => Auth::user()->id, 'videos_id' => $req->id]);
            $exists = Like::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $req->id],
            ])->exists();
            if($exists){
                Video::where("id", $req->id)->decrement("likes");
                Like::where([
                    ['users_id', '=', Auth::user()->id],
                    ['videos_id', '=', $req->id],
                ])->delete();
            }
            return true;
        }else{
            Video::where("id", $req->id)->decrement("dislikes");
            Dislike::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $req->id],
            ])->delete();
            return false;
        }
    }
}
