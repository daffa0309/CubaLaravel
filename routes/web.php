<?php

use App\Http\Controllers\PasswordController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');
// ->middleware('auth:api');

//post Login
Route::post('/authentication/login', [App\Http\Controllers\UserController::class, 'authenticate']);
Route::post('/authentication/signup', [App\Http\Controllers\UserController::class, 'signUp']);

//Forget Password
Route::post('/authentication/forget-password', function (Request $request) {
    $request->validate(['email' => 'required|email:dns']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//reset Password

Route::get('/reset-password/{token}', function (string $token) {
    return view('authentication.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', function (Request $request) {
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
})->middleware('guest')->name('password.update');
Route::view('sign-up', 'authentication.sign-up')->name('sign-up');

Route::middleware(['auth'])->group(function () {
    Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
    Route::put('edit-profile/update',  [App\Http\Controllers\UserController::class, 'editProfile'])->name('update-profile');
    Route::put('/update-password',  [App\Http\Controllers\UserController::class, 'changePassword'])->name('update-password');

    Route::get('/data-kriteria', [App\Http\Controllers\DataKriteria::class, 'getData'])->name('data-kriteria');
    Route::post('/insert/data-kriteria', [App\Http\Controllers\DataKriteria::class, 'insert'])->name('insert-data-kriteria');

    Route::get('/data-nilai-kriteria', [App\Http\Controllers\NilaiKriteriaController::class, 'getData'])->name('data-nilai-kriteria');
    Route::post('/insert/data-nilai-kriteria', [App\Http\Controllers\NilaiKriteriaController::class, 'insert'])->name('insert-nilai-kriteria');
    Route::view('index', 'dashboard.index')->name('index');

    Route::POST('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::post('/insert/data-kreditur', [App\Http\Controllers\DataKreditur::class, 'insert']);
    Route::put('/update-kreditur/{id}/{visible}', [App\Http\Controllers\DataKreditur::class, 'updateData']);
    Route::put('/update-account/{id}', [App\Http\Controllers\UserController::class, 'updateAkun'])->name('update-akun');
});
//Language Change

Route::get('/data-user', [App\Http\Controllers\UserController::class, 'getUsers'])->middleware(['checkRole:admin'])->name('data-user');

//get data All

// Route::get('/data-kreditur', [App\Http\Controllers\UserController::class, 'getData'])->name('datatable-basic-init');


Route::group(['prefix' => 'forms', 'middleware' => ['auth']], function () {
    Route::view('input-data', 'forms.input-data')->name('input-data');
});

Route::group(['prefix' => 'tables', 'middleware' => ['auth']], function () {
    Route::get('/data-kreditur', [App\Http\Controllers\DataKreditur::class, 'getData'])->name('data-kreditur');
});


Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'er rors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('authentication')->group(function () {
    Route::view('login', 'authentication.login')->name('login')->middleware('guest');
    Route::view('forget-password', 'authentication.forget-password')->name('forget-password')->middleware('guest');
    Route::view('reset-password', 'authentication.reset-password')->name('reset-password')->middleware('guest');
});
Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
