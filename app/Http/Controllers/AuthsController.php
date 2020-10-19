<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthsController extends Controller
{
    public function signin()
    {
        return view('layouts.signin');
    }

    public function signup()
    {
        return view('layouts.signup');
    }

    public function postSignup()
    {
    }

    public function postSignin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            Session::put('email', $user['email']);
            return redirect('/dashboard');
        } else
            Alert::error('ERROR', 'Email atau Password yang Dimasukkan Salah');
        return redirect('');
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/signin');
    }

    public function change_password() {
        return view('auth/change-password');
    }

    public function store_password(Request $request) {
        $user = User::where(['email' => Session::get('email')])->first();
        $user->password = Hash::make($request->input('password'));
        $user->password_retype = Hash::make($request->input('confirm_password'));
        $user->save();

        return redirect('/auth/change-password')->with([
            'type'   => 'success',
            'message' => 'Password berhasil diubah',
            'title'  => 'Good Job!'
        ]);
    }
}
