<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\videoUploadController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',function (){
    Artisan::call('storage:link');
    if(Auth::check()){
        return redirect('userpage/'.Auth::user()->id);
    }
    return view('registration');
})->name('register');
Route::post('register', [registrationController::class, 'add_user'])->name('user_register');

Route::view('userpage', 'userpage');

Route::get('logout', function(){
    Auth::logout();
    return redirect('register');
})->name('logout');

Route::get('login',function (){
    Artisan::call('storage:link');
    if(Auth::check()){
        return redirect('userpage/'.Auth::user()->id);
    }
    return view('login');
})->name('login');
Route::post('login', [loginController::class, 'let_user_in'])->name('user_login');

Route::Resource(
    'userpage', redirectController::class,
);


Route::get('addvideo', function(){
    if(Auth::check()){
        return view('addVideoPage');
    }
    return view('mainpage');
})->name('videoupload');
Route::post('addvideo', [videoUploadController::class, 'upload'])->name('videouplaoding');