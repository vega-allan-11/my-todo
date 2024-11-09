<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class RegisterUserController extends Controller
{
    //display the register form

    public function show(): View {
        return view('auth.register');
    }

    // save a user to the database

    public function store(Request $request): RedirectResponse {
        $request->validate([
        'fname' => 'required|string|max:50',
        'lname' => 'nullable|string|max:50',
        'email' => 'required|email|unique:users,email,' . User::class,
        'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
        ],
        [
            'required' => 'The :attribute field is required.', 
        ],
        
        [
            'fname'=> 'First Name',
            'lname'=> 'Last Name',
            'email'=> 'Email',
            'password'=> 'Password',
        ]
    );

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect(route('home', absolute:false));
    }
}
