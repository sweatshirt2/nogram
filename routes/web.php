<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Mail\NewPost;
use Faker\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

// Route::resource('posts', PostController::class, [
//     'only'=> ['index', 'show'],
// ]);

// Route::resource('posts', PostController::class, [
//     'only' => ['create', 'store'],
// ])->middleware('auth');

// Route::resource('posts', PostController::class)
//     ->only(['edit', 'update', 'destroy'])
//     ->middleware(['auth', 'can:edit,post']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create'])
    ->middleware('auth');
Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store'])
    ->middleware('auth');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'post');
Route::patch('posts', [PostController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'post');
Route::delete('posts/{post}', [PostController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit', 'post');
