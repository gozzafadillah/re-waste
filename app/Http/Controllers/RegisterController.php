<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // ddd($request);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'noTelp' => 'required|max:13',
            'nama_mitra' => 'required|min:3|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255|same:confirm'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/login')->with('success', 'Registration Successfull! Please Login');
    }
}
