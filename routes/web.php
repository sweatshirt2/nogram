<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use Faker\Factory;
use Illuminate\Contracts\View\View;

Route::view('/', 'welcome');

// Route::controller(PostController::class)->group(['posts'], function () {
//  Route::get('/', [PostController::class, 'index');
// });

Route::resource('posts', PostController::class, [
    // 'only'=> ['index'],
    // 'except'=> ['index'],
]);
