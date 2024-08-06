<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', function () {
    return view('posts.create');
});
Route::get('/edit', function () {
    return view('posts.edit');
});
Route::get('/index', function () {
    return view('posts.index');
});
Route::get('/show', function () {
    return view('posts.show');
});



Route::resource('posts', PostController::class);
