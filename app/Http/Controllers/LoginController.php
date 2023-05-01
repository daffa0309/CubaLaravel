<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // Pakai API

        // $http = new \GuzzleHttp\Client;
        // $username = $request->username;
        // $password = $request->password;
        // try {
        //     $response = $http->post('http://127.0.0.1:8080/api/v2/login', [
        //         'form_params' => [
        //             'username' => $username,
        //             'password' => $password
        //         ]
        //     ]);
        //     $response = json_decode((string) $response->getBody(), true);
        //     session()->put('token', $response['token']);
        //     $request->session()->regenerate();
        //     return redirect()->route('/');
        // } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        //     return redirect()->route('login');
        // }

            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                DB::beginTransaction();
                DB::commit();
                if(Auth::user()->level == 'admin'){
                    return redirect('/');
                }
            }else{
                return redirect()->route('login');
            }

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
