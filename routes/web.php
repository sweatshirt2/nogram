<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Faker\Factory;
use Illuminate\Contracts\View\View;

Route::view('/', 'welcome');

// Route::controller(PostController::class)->group(['posts'], function () {
//  Route::get('/', [PostController::class, 'index');
// });
Route::get('/login', function () {
    return view('auth.authenticate');
})->name('login');

Route::view('/signup', 'auth.authenticate');

Route::view('/login', 'auth.authenticate');
Route::post('/login', function () {
    request()->validate([
        'email'=> 'required|email',
        'password'=> 'required|min:8',
    ]);

    dd(request()->all());
});

Route::get('/signup', [RegistrationController::class, 'create']);
Route::post('/signup', [RegistrationController::class,'store']);

Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class,'destroy']);

Route::resource('posts', PostController::class, [
    'only'=> ['index', 'show'],
]);
Route::resource('posts', PostController::class)
    ->except(['index', 'show'])
    ->middleware(['auth', 'can:edit,post']);
