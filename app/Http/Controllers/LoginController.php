<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/index');
        }
        return back()->with('loginError', 'Email atau Password Salah!');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    function signUp(Request $request)
    {
        $rules = [
            'firstName' => ['required', 'string', 'max:25'],
            'lastName' => ['required', 'string', 'max:25'],

            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('sign-up')->withInput()->withErrors($validator);
        } else {
            $data = $request->all();
            $user = new User;
            $user->FirstName = $data['firstName'];
            $user->LastName = $data['lastName'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->level = 'user';
            $user->remember_token = Str::random(60);
            $user->save();
            $request->session()->flash('success', 'Daftar Akun berhasil! Silahkan Login');
            return redirect('authentication/login')->with('status', "Sign up success");
        }
    }
}
