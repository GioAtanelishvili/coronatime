<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
	public function test_user_is_able_to_change_application_language_to_georgian()
	{
		$response = $this->get('/language/ka');

		$response->assertSessionHas('locale', 'ka');
	}

	public function test_user_is_able_to_change_application_language_to_english()
	{
		$response = $this->get('/language/en');

		$response->assertSessionHas('locale', 'en');
	}

	public function test_localization_middleware_sets_application_locale_according_to_current_session()
	{
		$this->withSession(['locale' => 'ka'])->get('/auth/login');

		$this->assertTrue(App::getLocale() === 'ka');
	}
}
