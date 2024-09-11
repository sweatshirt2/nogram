<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    $posts = Post::getAll();
    return view('posts', compact('posts'));
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::getById(intval($id));
    return view('post', compact('post'));
});

Route::get('/people', function () {
    return view('people');
});
