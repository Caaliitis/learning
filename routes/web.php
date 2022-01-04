<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// If route doesnt exist, then redrect to /
Route::fallback(function () {
    return redirect('/');
});    

//home page a.k.a. welcome page
Route::get('/', function(){
    return view('welcome');
});

//this enables auth routes like /login. Also enables auth header menu Login/register
Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post.list');
    Route::post('post', [App\Http\Controllers\PostController::class, 'store'])->name('post.create.form');
    Route::get('post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create.view');
    Route::get('post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit.view');
    Route::post('post/{post}/edit', [App\Http\Controllers\PostController::class, 'update'])->name('post.edit.form');
    Route::get('post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.get.view');
    Route::post('post/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');

});