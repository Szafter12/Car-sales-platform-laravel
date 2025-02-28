<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }
}
