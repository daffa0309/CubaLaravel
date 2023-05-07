<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    function getData()
    {
        $users = User::get();
        return view('tables.datatable-basic-init', ['users' => $users]);
    }
}
