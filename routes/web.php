<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Contracts\View\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function (): Factory|View {
    // $posts = Post::with(relations: 'author')->get();
    // $posts = Post::with('author')->simplePaginate(12);
    // $posts = Post::with('')->cursorPaginate(12);
    $posts = Post::with('author')->paginate(12);
    return view('posts.index', compact('posts'));
});

Route::get('posts/create', function () {
    return view('posts.create');
});

Route::get('/posts/{id}', function ($id): View {
    $post = Post::with(['author', 'comments.author'])->findOrFail(intval($id));
    return view('posts.show', compact('post'));
});

Route::post('posts', function () {
    $rules = [
        'title'=> 'required|unique:posts,title|max:30',
        'content'=> 'required',
    ];
    request()->validate($rules);

    $authors = Author::all();
    $index = random_int(0, count($authors) - 1);
    Post::create([
        'title'=> request('title'),
        'content'=> request('content'),
        'author_id'=> $authors[$index]['id'],
    ]);

    return redirect('/posts');
});

Route::get('/people', function (): View {
    return view('people');
});
