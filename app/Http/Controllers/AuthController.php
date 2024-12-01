<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login.utama');
    }

    // ini login
    public function login(Request $request)
    {
        $request->validate([
            'idLibrary' => 'required',
            'password' => 'required|min:8',
        ]);
    
        $credentials = $request->only('idLibrary', 'password');
    
        // rolenya
    if (Auth::attempt(['idLibrary' => $request->idLibrary, 'password' => $request->password])) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('pengunjung');
        }
    }
    
        return back()->withErrors([
            'loginError' => 'ID Library atau password salah.',
        ]);
    }    

    // ini logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // ini register
    public function registerForm()
    {
        return view('login.utama');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'idLibrary' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
    
        User::create([
            'name' => $request->name,
            'idLibrary' => $request->idLibrary,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengunjung',
        ]);
    
        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login^^.');
    }
    
}

