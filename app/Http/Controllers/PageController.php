<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('pages.login', [
            'title' => 'Login'
        ]);
    }

    public function register()
    {
        return view('pages.register', [
            'title' => 'Register'
        ]);
    }
}
