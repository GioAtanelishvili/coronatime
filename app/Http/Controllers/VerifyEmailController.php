<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyEmailRequest;

class VerifyEmailController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function __invoke(VerifyEmailRequest $request)
	{
		$request->fulfill();

		return redirect()->route('auth.login');
	}
}
