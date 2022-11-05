<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
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
		event(new Registered(
			User::create($request->validated())
		));

		return redirect()->route('verification.notice');
	}
}
