<?php

namespace App\Http\Controllers;

use App\Models\DataKreditur;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{


    public function editProfile(Request $request)
    {
        $request->validate([
            'firstName' => ['string', 'min:3', 'max:191', 'required'],
            'lastName' => ['string', 'string', 'min:3', 'max:191', 'required'],
            'email' => ['email', 'string', 'min:3', 'max:191', 'unique:users,email,' . auth()->id()],
        ]);
        auth()->user()->update([
            'FirstName' => $request->firstName,
            'LastName' => $request->lastName,
            'email' => $request->email,
        ]);
        return back()->with('message', 'Profil Berhasil Diperbaharui');
    }
    public function updateAkun(Request $request, $id)
    {
        $request->validate([
            'firstName' => ['string', 'min:3', 'max:191', 'required'],
            'lastName' => ['string', 'string', 'min:3', 'max:191', 'required'],
            'email' => ['email', 'string', 'min:3', 'max:191', 'unique:users,email,' . $id],
        ]);
        $account = User::findOrFail($id);

        $account->update([
            'FirstName' => $request->firstName,
            'LastName' => $request->lastName,
            'email' => $request->email,
        ]);
        return back()->with('message', 'Data Akun Berhasil Diperbaharui');
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('tables/data-kreditur');
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
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $user = new User;
            $data = $request->all();
            $isLevel = $data['level']  ?? null;
            $user->FirstName = $data['firstName'];
            $user->LastName = $data['lastName'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->level = $isLevel == null ? 'user' : $isLevel;
            $user->remember_token = Str::random(60);
            $user->save();
            $request->session()->flash('success', 'Daftar Akun berhasil! Silahkan Login');
            return redirect('authentication/login')->with('status', "Sign up success");
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    public function forgetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email:dns']);
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    public function changePassword(Request $request)
    {
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ];
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with('alertPass', 'Password Baru harus lebih dari 8 karakter!');
        } elseif (!Hash::check($currentPassword, auth()->user()->password)) {
            return back()->with('alertPass', 'Password Salah!');
        } else {

            auth()->user()->update(['password' => Hash::make($newPassword)]);
            return back()->with('messagePassword', 'Password Diperbaharui');
        }
    }
    public function getUsers(Request $request)
    {
        $users =  DB::table('users')->get();
        return view('tables.master-account', compact('users'));
    }
}
