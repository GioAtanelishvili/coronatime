<?php

use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResetPasswordController;
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

Route::prefix('/auth')->name('auth.')->group(function () {
	Route::view('/login', 'login')->name('login');

	Route::post('/login', LoginController::class)->name('login');

	Route::view('/register', 'register')->name('register');

	Route::post('/register', RegisterController::class)->name('register');

	Route::post('/logout', LogoutController::class)->name('logout');
});

Route::prefix('/email')->name('verification.')->group(function () {
	Route::view('/verify/notification', 'email-notification')->name('notice');

	Route::get('/verify/{id}/{hash}', VerifyEmailController::class)
		->middleware(['signed', 'throttle:6,1'])
		->name('verify');
});

Route::middleware(['auth'])->name('dashboard.')->group(function () {
	Route::view('/', 'dashboard-worldwide')->name('worldwide');

	Route::view('/country', 'dashboard-country')->name('country');
});

Route::middleware('guest')->name('password.')->group(function () {
	Route::prefix('/forgot-password')->group(function () {
		Route::view('/', 'forgot-password')->name('request');

		Route::post('/', [ResetPasswordController::class, 'email'])->name('email');

		Route::view('/notification', 'email-notification')->name('forgot.notice');
	});

	Route::prefix('/reset-password')->group(function () {
		Route::view('/notification', 'password-notification')->name('reset.notice');

		Route::get('/{token}', [ResetPasswordController::class, 'show'])->name('reset');

		Route::patch('/', [ResetPasswordController::class, 'update'])->name('update');
	});
});
