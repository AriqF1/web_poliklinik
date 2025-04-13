<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        return redirect()->intended('pasien.index')->with('success', 'Login successful');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput();
}


    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
