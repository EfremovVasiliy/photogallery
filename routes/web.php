<?php

use App\Models\User;
use Illuminate\Http\Request;
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

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('post', \App\Http\Controllers\PostController::class)->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::post('/comment-create', 'App\Http\Controllers\CommentController@create')->name('comment.create');
    Route::put('/comment-update', 'App\Http\Controllers\CommentController@update')->name('comment.update');
    Route::delete('/comment-delete', 'App\Http\Controllers\CommentController@delete')->name('comment.delete');

    Route::post('/like', 'App\Http\Controllers\LikeController@like')->name('like');
    Route::delete('/dislike', 'App\Http\Controllers\LikeController@dislike')->name('dislike');
});

Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
