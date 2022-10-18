<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Incorrect email or password!']);
        }
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');
     
    }

    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
