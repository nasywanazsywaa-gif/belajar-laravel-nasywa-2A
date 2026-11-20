<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (session('logged_in')) {
            return redirect('/dashboard');
        }

        return view('login');
    }

    public function cek(Request $request): RedirectResponse
    {
        // mencari data email di table users
        $data = User::where('email', $request->email)->first();

        // jika datanya ketemu
        if ($data) {
            // cek apakah password sama
            if (Hash::check($request->password, $data->password)) {
                // simpan session
                session(['email' => $request->email]);
                session(['logged_in' => true]);

                // masuk ke dashboard
                return redirect('/dashboard');
            } else {
                // kembali ke login
                return redirect('/')->with('error', 'Password yang dimasukkan salah!');
            }
        } else {
            // kembali ke login
            return redirect('/')->with('error', 'Email tidak terdaftar!');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        // hapus semua session
        $request->session()->flush();

        // kembali ke login
        return redirect('/');
    }
}
