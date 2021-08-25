<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('modules.login.index', [
            'title' => 'Login'
        ]);
    }
}
