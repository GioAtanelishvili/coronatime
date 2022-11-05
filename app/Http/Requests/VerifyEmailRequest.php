<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class VerifyEmailRequest extends FormRequest
{
	/**
	 * The user to verify
	 *
	 * @var \App\Models\User|null
	 */
	protected $user;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if (!($this->user = User::find($this->route('id'))))
		{
			return false;
		}

		if (!hash_equals(
			(string) $this->route('hash'),
			sha1($this->user->getEmailForVerification())
		))
		{
			return false;
		}

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
		];
	}

	/**
	 * Fulfill the email verification request.
	 *
	 * @return void
	 */
	public function fulfill()
	{
		if (!$this->user->hasVerifiedEmail())
		{
			$this->user->markEmailAsVerified();

			event(new Verified($this->user));
		}
	}
}
