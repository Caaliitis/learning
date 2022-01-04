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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post.list');
Route::get('post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create.view');
Route::post('post', [App\Http\Controllers\PostController::class, 'store'])->name('post.create.form');
Route::get('post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit.view');
Route::post('post/{post}/edit', [App\Http\Controllers\PostController::class, 'update'])->name('post.edit.form');
Route::get('post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.get.view');
Route::post('post/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');