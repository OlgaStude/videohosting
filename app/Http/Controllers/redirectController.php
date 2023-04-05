<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class redirectController extends Controller
{
    public function index(){
        return redirect('login');
    }
    public function show($id, Request $req)
    {
        
        if(User::where('id','=', $id)->exists()){
            $owner_id = $id;
            return view('userpage', compact('owner_id'));
        }
        else {
        return redirect('mainpage');
    }}
}
