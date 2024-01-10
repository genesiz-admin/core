<?php

namespace Genesizadmin\GenesizCore\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return inertia('auth/login');
        }

        // xbayer@example.com
        if (Auth::guard(config('genesiz-core.auth.guard'))->attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid user credentials'
        ]);
    }
}
