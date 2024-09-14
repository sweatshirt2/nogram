<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        return view("auth.authenticate");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
        'firstName'=> 'required|max:30',
        'lastName'=> 'max:30',
        'email'=> 'required|email',
        'password'=> 'required|min:8|confirmed',
        ]);


        $user = User::create($attributes);

        Author::create([
            'user_id'=> $user->id,
        ]);

        Auth::login($user);

        return redirect('/posts')->with('registration-success','You have created an account successfully.');
    }
}
