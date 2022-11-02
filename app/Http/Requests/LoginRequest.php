<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
			'name'     => ['required_without:email', 'min:3', 'max:255'],
			'email'    => ['required_without:name', 'email', 'max:255'],
			'password' => ['required', 'min:3', 'max:255'],
			'remember' => ['required', 'boolean'],
		];
	}

	/**
	 * Prepare the data for validation.
	 *
	 * @return void
	 */
	protected function prepareForValidation()
	{
		$this->mergeIfMissing(['remember' => false]);

		if (filter_var($value = $this->input('name'), FILTER_VALIDATE_EMAIL))
		{
			$this->offsetUnset('name');
			$this->merge(['email' => $value]);
		}
	}
}
