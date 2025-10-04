<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect; // Redirect sudah tidak digunakan

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => ['required', 'min:3', 'regex:/[A-Z]/']
        ], [
            'password.min' => 'Password minimal harus 3 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kapital.'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $username && $password === $password) {
          
            return view('login-form', ['success' => 'SUCCESS']);
        } else {
        
            return view('login-form', ['error' => 'ERROR!']);
        }
    }
}
