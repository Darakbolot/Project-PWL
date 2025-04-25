<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $response = Http::post('https://jwt-auth-eight-neon.vercel.app/login', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Simpan refreshToken ke session
            Session::put('refreshToken', $data['refreshToken'] ?? null);
            Session::put('user_email', $request->email);

            return redirect()->route('MasterTutorial.index'); 
        } else {
            return back()->withErrors(['login' => 'Login gagal. Email atau password salah.']);
        }
    }

    public function logout()
    {
        $token = Session::get('refreshToken');

        $response = Http::withToken($token)->get('https://jwt-auth-eight-neon.vercel.app/logout');

        if ($response->successful() && $response->body() == 'OK') {
            Session::flush(); // hapus semua session
            return redirect('/login')->with('success', 'Berhasil logout');
        }

        return redirect('/login')->with('error', 'Logout gagal, coba lagi.');
    }
}
