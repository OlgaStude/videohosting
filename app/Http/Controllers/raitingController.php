<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class raitingController extends Controller
{
    public function like(Request $req)
    {
        if (isset($req->id)) {
            $exists = Like::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $req->id],
            ])->exists();
            if (!$exists) {
                Video::where("id", $req->id)->increment("likes");
                Video::where("id", $req->id)->increment("likes_to_dislikes");
                Like::create(['users_id' => Auth::user()->id, 'videos_id' => $req->id]);
                $exists = Dislike::where([
                    ['users_id', '=', Auth::user()->id],
                    ['videos_id', '=', $req->id],
                ])->exists();
                if ($exists) {
                    Video::where("id", $req->id)->decrement("dislikes");
                    Video::where("id", $req->id)->increment("likes_to_dislikes");
                    Dislike::where([
                        ['users_id', '=', Auth::user()->id],
                        ['videos_id', '=', $req->id],
                    ])->delete();
                }
                return true;
            } else {
                Video::where("id", $req->id)->decrement("likes");
                Video::where("id", $req->id)->decrement("likes_to_dislikes");
                Like::where([
                    ['users_id', '=', Auth::user()->id],
                    ['videos_id', '=', $req->id],
                ])->delete();
                return false;
            }
        } else {
            return redirect()->back();
        }
    }

    public function dislike(Request $req)
    {
        if (isset($req->id)) {
            $exists = Dislike::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $req->id],
            ])->exists();
            if (!$exists) {
                Video::where("id", $req->id)->increment("dislikes");
                Video::where("id", $req->id)->decrement("likes_to_dislikes");
                Dislike::create(['users_id' => Auth::user()->id, 'videos_id' => $req->id]);
                $exists = Like::where([
                    ['users_id', '=', Auth::user()->id],
                    ['videos_id', '=', $req->id],
                ])->exists();
                if ($exists) {
                    Video::where("id", $req->id)->decrement("likes");
                    Video::where("id", $req->id)->decrement("likes_to_dislikes");
                    Like::where([
                        ['users_id', '=', Auth::user()->id],
                        ['videos_id', '=', $req->id],
                    ])->delete();
                }
                return true;
            } else {
                Video::where("id", $req->id)->decrement("dislikes");
                Video::where("id", $req->id)->increment("likes_to_dislikes");
                Dislike::where([
                    ['users_id', '=', Auth::user()->id],
                    ['videos_id', '=', $req->id],
                ])->delete();
                return false;
            }
        } else {
            return redirect()->back();
        }
    }
}
