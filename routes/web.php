<?php

use App\Http\Controllers\changeStatusController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\raitingController;
use App\Http\Controllers\redirectController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\sendCommentController;
use App\Http\Controllers\videoUploadController;
use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
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
    return redirect('mainpage');
});

Route::get('register', function () {
    Artisan::call('storage:link');
    if (Auth::check()) {
        return redirect('userpage/' . Auth::user()->id);
    }
    return view('registration');
})->name('register');
Route::post('register', [registrationController::class, 'add_user'])->name('user_register');

Route::view('userpage', 'userpage');

Route::get('logout', function () {
    Auth::logout();
    return redirect('register');
})->name('logout');

Route::get('login', function () {
    Artisan::call('storage:link');
    if (Auth::check()) {
        return redirect('userpage/' . Auth::user()->id);
    }
    return view('login');
})->name('login');
Route::post('login', [loginController::class, 'let_user_in'])->name('user_login');

Route::Resource(
    'userpage',
    redirectController::class,
);


Route::get('addvideo', function () {
    if (Auth::check()) {
        return view('addVideoPage');
    }
    return redirect('mainpage');
})->name('videoupload');
Route::post('addvideo', [videoUploadController::class, 'upload'])->name('videouplaoding');

Route::get('mainpage', function () {
    Artisan::call('storage:link');
    $videos = Video::where('restrictions', '=', '0')->orderBy('id', 'desc')->paginate(12);
    return view('mainpage', compact('videos'));
})->name('mainPage');

Route::get('video/{id}', function ($id) {
    $video = Video::find($id);
    $user = User::find($video->users_id);
    if ($video) {
        if ($video->restrictions == 0 || $video->restrictions == 2) {
            $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->where('videos_id', '=', $id)
            ->select('comments.id', 'comments.user_id', 'comments.user_name', 'comments.text', 'comments.created_at', 'users.path')
            ->orderBy('id', 'desc')
            ->paginate(20);
            return view('videopage', compact('video', 'comments', 'user'));
        } else {
            return redirect()->back();
        }
    } else {
        return redirect()->back();
    }
});

Route::get('like', [raitingController::class, 'like'])->name('liked');
Route::get('dislike', [raitingController::class, 'dislike'])->name('disliked');

Route::get('sendcomment', [sendCommentController::class, 'send'])->name('sendComment');

Route::get('adminpanel', function () {
    if (Auth::check()) {
        if (Auth::user()->status == 'admin') {
            $videos = Video::orderBy('id', 'desc')->get();
            return view('adminPanel', compact('videos'));
        }
    }
    return redirect('mainpage');
})->name('admin');
Route::get('statuschange', [changeStatusController::class, 'change'])->name('statusChange');

Route::get('search', [searchController::class, 'search'])->name('search');
Route::get('categorysearch', [searchController::class, 'searchCategory'])->name('searchCategory');
Route::get('categorysearchuser', [searchController::class, 'searchCategoryUser'])->name('searchCategoryUser');
Route::get('categorysearchadmin', [searchController::class, 'searchCategoryAdmin'])->name('searchCategoryAdmin');
