<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('pages.login', [
        'title' => 'Login'
    ]);
});

Route::get('/register', function () {
    return view('pages.register', [
        'title' => 'Register'
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/users', function () {
//     return view('modules.users.index', [
//         'title' => 'Users'
//     ]);
// });

Route::resource('users', UserController::class);
