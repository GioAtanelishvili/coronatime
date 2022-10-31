<?php

use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::prefix('auth')->name('auth.')->group(function () {
	Route::view('/login', 'login')->name('login');

	Route::post('/login', LoginController::class)->name('login');

	Route::view('/register', 'register')->name('register');

	Route::post('/register', RegisterController::class)->name('register');
});

Route::middleware(['auth'])->prefix('email')->name('verification.')->group(function () {
	Route::view('/verify', 'verify-email')->name('notice');

	Route::get('/verify/{id}/{hash}', VerifyEmailController::class)
		->middleware(['signed', 'throttle:6,1'])
		->name('verify');
});

Route::middleware('guest')->prefix('forgot-password')->name('password.')->group(function () {
	Route::view('/', 'forgot-password')->name('request');
});
