<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.authenticate");
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:8',
        ]);

        if (! Auth::attempt($attributes)) {
            return ValidationException::withMessages([
                'email'=> 'Credentials do not match.',
            ]);
        }

        // ! find it's dependency injection variant
        request()->session()->regenerate();
        // $request->regenerate()->session();

        return redirect('/posts');
    }
    public function destroy()
    {
        Auth::logout();

        return redirect("/posts");
    }
}
