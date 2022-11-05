<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param string $locale
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function __invoke($locale)
	{
		App::setLocale($locale);
		session()->put('locale', $locale);

		return back();
	}
}
