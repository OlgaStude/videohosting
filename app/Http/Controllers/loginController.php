<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function let_user_in(loginRequest $req){
        $formFields = $req->only(['email', 'password']);

        if(Auth::attempt($formFields)){
            $user = User::where("email", $formFields['email'])->get();
            return redirect('userpage/'.Auth::user()->id);
            // return redirect('userpage/'.$user['0']->id);
        }

        return redirect(route('login'))->withErrors([
            'formError' => 'Не верный логин или пароль'
        ]);
    }
}
