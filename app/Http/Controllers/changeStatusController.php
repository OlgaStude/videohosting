<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class changeStatusController extends Controller
{
    public function change(Request $req){
        Video::where('id', '=', $req->id)->update(["restrictions" => $req->restriction]);
    }
}
