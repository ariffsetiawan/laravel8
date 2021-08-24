<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('modules.dashboard.index', [
            'title' => 'Dashboard',
            'user' => User::count()
        ]);
    }
}
