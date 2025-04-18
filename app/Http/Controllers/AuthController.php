<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect('/admin/dashboard'),
                'teller' => redirect('/teller/dashboard'),
                'user' => redirect('/user/dashboard'),
                default => redirect('/login'),
            };
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/login'); // Arahkan ke halaman login
    }
}
