<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
	/**
	 * Handle an authentication attempt
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return Illuminate\Http\RedirectResponse
	 */
	public function __invoke(LoginRequest $request)
	{
		$credentials = $request->except(['remember', '_token']);

		if (Auth::attempt($credentials, $request->only('remember')))
		{
			$request->session()->regenerate();

			return redirect()->intended('dashboard');
		}
		else
		{
			return back()->withErrors([
				'password' => 'The provided credentials do not match our records.',
			])->onlyInput('name');
		}
	}
}
