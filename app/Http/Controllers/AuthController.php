<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session('admin_id')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Plain-text comparison (insecure) as requested
        $admin = Admin::where('username', $request->username)
                      ->where('password', $request->password)
                      ->first();

        if (!$admin) {
            return back()->withErrors(['credentials' => 'Invalid username or password'])->withInput();
        }

        session(['admin_id' => $admin->id, 'admin_username' => $admin->username]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
