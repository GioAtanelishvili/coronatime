<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
	public function email(Request $request)
	{
		$request->validate(['email' => ['required', 'email', 'max:255']]);

		$status = Password::sendResetLink($request->only('email'));

		return $status === Password::RESET_LINK_SENT
				? redirect()->route('password.forgot.notice')
				: back()->withErrors(['email' => __($status)]);
	}

	public function show(Request $request, $token)
	{
		return view('reset-password', ['token' => $token, 'email' => $request->query('email')]);
	}

	public function update(ResetPasswordRequest $request)
	{
		Password::reset(
			$request->validated(),
			function ($user, $password) {
				$user->forceFill([
					'password' => $password,
				]);

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return redirect()->route('password.reset.notice');
	}
}
