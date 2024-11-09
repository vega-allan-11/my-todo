<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class RequestPasswordResetController extends Controller
{
    //show the request password reset form
    public function show() {
        return view('auth.forgot-password');
    }

    // send the the link to recover the password
    public function store(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success', __($status))
                    : back()->with('error', __($status));
        
    }
}
