<?php

namespace App\Http\Controllers;

use App\Mail\NewPost;
use App\Models\Author;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index(): View
    {
        // $posts = Post::with(relations: 'author')->get();
        // $posts = Post::with('author')->simplePaginate(12);
        // $posts = Post::with('')->cursorPaginate(12);
        $posts = Post::with('author.user')->paginate(12);
        return view('posts.index', compact('posts'));
    }
    public function create(): View
    {
        return view('posts.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $rules = [
        'title'=> 'required|unique:posts,title|max:30',
        'content'=> 'required',
        ];
        $request->validate($rules);

        $user = Auth::user();
        $author = Author::where('user_id', $user->id)->first();

        $post = Post::create([
            'title'=> request('title'),
            'content'=> request('content'),
            'author_id'=> $author->id,
        ]);

        Mail::to($user)->send(new NewPost(Author::where('user_id', Auth::user()->id)->first(),$post));

        return redirect('/posts');
    }
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post): RedirectResponse|View
    {
        // commented out because it's handled in routes middleware
        // Gate::authorize('edit-post', $post);
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        // Auth::user()->can('edit-job', $post);
        // Gate::authorize('edit-post', $post);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post): RedirectResponse
    {
        // Gate::authorize('edit-post', $post);
        // commented out because it's handled in routes middleware
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
        // Gate::authorize('edit-post', $post);
        // commented out because it's handled in routes middleware
        if ($post->author->user->isNot(Auth::user())) {
            abort(403);
            // abort(403, 'message');
        }
        $post->delete();
        return redirect("/posts");
    }
}
