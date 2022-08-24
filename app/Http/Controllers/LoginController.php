<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $http = new \GuzzleHttp\Client;
        $email = $request->email;
        $password = $request->password;
        $response = $http->post('http://127.0.0.1:8080/api/login', [
            'headers' => [
                'Authorization' => 'Bearer' . session()->get('token.access_token')
            ],
            'query' => [
                'email' => $email,
                'password' => $password
            ]
        ]);
        $result = json_decode((string)$response->getBody(), true);
        // return redirect()->intended('/');
    }
}
