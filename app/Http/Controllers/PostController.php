<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class PostController extends Controller
{
    public function index(): View
    {
        // $posts = Post::with(relations: 'author')->get();
        // $posts = Post::with('author')->simplePaginate(12);
        // $posts = Post::with('')->cursorPaginate(12);
        $posts = Post::with('author')->paginate(12);
        return view('posts.index', compact('posts'));
    }
    public function create(): View
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
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
    }
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        request()->validate([
        'content'=> 'required',
        ]);
        $post->update([
            'content'=> request('content'),
        ]);
        return redirect("/posts/$post->id");
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect("/posts");
    }
}
