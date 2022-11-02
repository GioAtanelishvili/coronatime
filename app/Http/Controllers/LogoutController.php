<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
	/**
	 * Log the user out of the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function __invoke(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect()->route('auth.login');
	}
}
