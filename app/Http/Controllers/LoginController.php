<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

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


    // public function auth(Request $request)
    // {
    //     $this->validate($request, [
    //         'username' => 'required|max:200',
    //         'password' => 'required|max:100',
    //     ]);

    //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    //         # code...
    //         DB::beginTransaction();

    //         DB::commit();
    //         if (Auth::user()->role_id == 1) {
    //             return redirect('/');
    //         }
    //     }
    //     # code...
    //     return redirect()->route('login')->with('error', 'Periksa kembali username atau password anda!');
    // }

    // public function logout()
    // {
    //     auth()->logout();

    //     return redirect()->route('login');
    // }
}
