<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->with(Alert::SESSION_KEY, 'Invalid login details');
        }
        $request->session()->regenerate();

        return redirect()->intended()->with(Alert::SESSION_KEY, 'Welcome back!');
    }
}
