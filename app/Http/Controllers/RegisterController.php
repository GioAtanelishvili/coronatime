<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
	/**
	 * Handle a register
	 *
	 * @param \App\Http\Requests\RegisterRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function __invoke(RegisterRequest $request)
	{
		Auth::login($user = User::create($request->validated()));

		event(new Registered($user));

		return redirect()->route('verification.notice');
	}
}
