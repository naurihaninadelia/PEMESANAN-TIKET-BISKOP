<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required', 'same:password']
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create([
            'username' => $validateData['username'],
            'password' => $validateData['password'],
            'role' => 'admin'
        ]);
        return redirect('/login');
    }
}

