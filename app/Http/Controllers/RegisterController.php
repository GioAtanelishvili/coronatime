<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
	public function __invoke(RegisterRequest $request)
	{
		Auth::login($user = User::create($request->validated()));

		event(new Registered($user));

		return redirect()->route('verification.notice');
	}
}
