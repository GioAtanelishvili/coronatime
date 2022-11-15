<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_authenticated_user_is_redirected_to_dashboard_when_accessing_login_route()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get('/auth/login');

		$response->assertStatus(302)->assertRedirect('/');
	}

	public function test_unauthenticated_user_is_able_to_access_login_page()
	{
		$response = $this->get('/auth/login');

		$response->assertOk()->assertViewIs('login');
	}

	public function test_submitting_form_without_data_triggers_validation_errors()
	{
		$response = $this->post('/auth/login');

		$response->assertSessionHasErrors(['name', 'email', 'password']);
	}

	public function test_submitting_form_with_invalid_credentials_triggers_validation_error()
	{
		$response = $this->post('/auth/login', [
			'name'     => 'zazaevich',
			'password' => 'motoburti123',
		]);

		$response->assertStatus(302)->assertSessionHasErrors(['password'])->assertSessionHasInput('name', 'zazaevich');
	}

	public function test_user_is_able_to_authenticate_with_name()
	{
		User::create([
			'name'              => 'pipinia',
			'email'             => 'peri@gmail.com',
			'password'          => 'portaturi',
			'email_verified_at' => now(),
		]);

		$response = $this->post('/auth/login', [
			'name'     => 'pipinia',
			'password' => 'portaturi',
		]);

		$response->assertStatus(302)->assertSessionHas('_token')->assertRedirect('/');
	}

	public function test_user_is_able_to_authenticate_with_email()
	{
		User::create([
			'name'              => 'pipinia',
			'email'             => 'peri@gmail.com',
			'password'          => 'portaturi',
			'email_verified_at' => now(),
		]);

		$response = $this->post('/auth/login', [
			'name'     => 'peri@gmail.com',
			'password' => 'portaturi',
		]);

		$response->assertStatus(302)->assertSessionHas('_token')->assertRedirect('/');
	}
}
