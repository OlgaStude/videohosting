<?php

namespace App\Http\Controllers;

use App\Http\Requests\registrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registrationController extends Controller
{
    public function add_user(registrationRequest $req){
        $req->file('pfp')->store('public/profile_pics');
        $pfp_name = $req->file('pfp')->hashName();
        $user = User::create(array_merge($req->validated(), ['password' => Hash::make($req->password), 'path' => $pfp_name, 'status' => 'user']));
        if($user){
            Auth::login($user);
            return redirect('userpage');
        }
    }
}
