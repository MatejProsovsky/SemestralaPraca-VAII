<?php

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
    return view('user/logout');
});

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\MenuController::class, 'welcome'])->name('menu.welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cpu', [App\Http\Controllers\MenuController::class, 'cpu'])->name('menu.cpu');
Route::get('/gpu', [App\Http\Controllers\MenuController::class, 'gpu'])->name('menu.gpu');
Route::get('/memory', [App\Http\Controllers\MenuController::class, 'memory'])->name('menu.memory');
Route::get('/others', [App\Http\Controllers\MenuController::class, 'others'])->name('menu.others');
Route::get('/smart', [App\Http\Controllers\MenuController::class, 'smart'])->name('menu.smart');
Route::get('/ntb', [App\Http\Controllers\MenuController::class, 'ntb'])->name('menu.ntb');

Route::get('/profile',[App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');

Route::get('/editProfile',[App\Http\Controllers\UserController::class, 'editProfile'])->name('user.editProfile');
Route::post('/editProfile',[App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.updateProfile');

Route::get('/editUser',[App\Http\Controllers\UserController::class, 'edit'])->name('user.editUser');
Route::post('/editUser',[App\Http\Controllers\UserController::class, 'update'])->name('user.updateUser');

Route::get('/post/create',[App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::post('/home',[App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');

Route::get('/post/show/{id}',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');


//Route::get('/comment/create',[App\Http\Controllers\CommentsController::class, 'create'])->name('comments.create');
//Route::post('/home',[App\Http\Controllers\CommentsController::class, 'store'])->name('comment.store');

//Route::get('/editPost/{id}',[App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit');
//Route::post('/editPost/{id}',[App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');

//Route::post('/post/show',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('comment', \App\Http\Controllers\CommentsController::class);
    Route::get('/comments/{comment}/delete', [\App\Http\Controllers\CommentsController::class, 'destroy'])->name('comment.delete');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('post', \App\Http\Controllers\PostsController::class);
    Route::get('/post/{post}/delete', [\App\Http\Controllers\PostsController::class, 'destroy'])->name('post.delete');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::get('/user/{user}/delete', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
});



