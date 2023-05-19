<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function getData()
    {
        $users =  DB::table('data_kreditur')
            ->leftjoin('data_penilaian', 'data_kreditur.idKreditur', "=", 'data_penilaian.idKreditur')
            ->get();
        return view('tables.datatable-basic-init', ['users' => $users]);
    }
    function signUp(Request $request)
    {
        $rules = [
            'firstName' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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
            return redirect('authentication/login')->with('status', "Sign up success");
        }
    }
}
