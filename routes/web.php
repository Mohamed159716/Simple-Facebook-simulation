<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ActionbtnController;
use App\Http\Controllers\UserController;

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

Route::resource('posts', PostController::class);
// Route::resource('dashboard', PostController::class);

Route::get('dashboard', function() {
    return view('dashboard');
});

Route::get('all', function() {
    return view('posts.allposts');
});

Route::get('friends', function() {
    return view('posts.friends');
});

Route::resource('/comments', CommentController::class);

Route::resource('/actionbtn', ActionbtnController::class);

Route::resource('/updatedata', UserController::class);


// Route::middleware(['auth:sanctum', 'verified'])->get('/test', function () {


// })->name('dashboard');
