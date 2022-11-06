<?php

return [
	'email' => ':attribute უნდა იყოს ვალიდური ელ-ფოსტის მისამართი.',
	'max'   => [
		'string' => ':attribute ველი უნდა შედგებოდეს მაქსიმუმ :max სიმბოლოსგან.',
	],
	'min' => [
		'string' => ':attribute ველი უნდა შედგებოდეს მინიმუმ :min სიმბოლოსგან.',
	],
	'required' => ':attribute ველი სავალდებულოა.',
	'same'     => ':attribute და :other უნდა ემთხვეოდეს.',
	'unique'   => 'შეყვანილი :attribute უკვე გამოყენებულია.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [
		'name'                  => 'სახელი',
		'email'                 => 'ელ-ფოსტა',
		'password'              => 'პაროლი',
		'password_confirmation' => 'გამეორებული პაროლი',
	],
];
