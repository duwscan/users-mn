<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status == Password::RESET_LINK_SENT
            ? back()->with(Alert::SESSION_KEY, __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
