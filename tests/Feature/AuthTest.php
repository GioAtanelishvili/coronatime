<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
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
		User::factory()->create([
			'name'     => 'pipinia',
			'password' => 'portaturi',
		]);

		$response = $this->post('/auth/login', [
			'name'     => 'pipinia',
			'password' => 'portaturi',
		]);

		$response->assertStatus(302)->assertSessionHas('_token')->assertRedirect('/');
	}

	public function test_user_is_able_to_authenticate_with_email()
	{
		User::factory()->create([
			'name'     => 'peri@gmail.com',
			'password' => 'portaturi',
		]);

		$response = $this->post('/auth/login', [
			'name'     => 'peri@gmail.com',
			'password' => 'portaturi',
		]);

		$response->assertStatus(302)->assertSessionHas('_token')->assertRedirect('/');
	}

	public function test_authenticated_user_is_able_to_log_out()
	{
		$user = User::factory()->create();

		$this->be($user)->post('/auth/logout');

		$this->assertGuest();
	}

	public function test_log_out_route_redirects_user_to_log_in_page()
	{
		$user = User::factory()->create();

		$this->be($user)->assertAuthenticated();

		$response = $this->post('/auth/logout');

		$response->assertStatus(302)->assertRedirect('/auth/login');
	}
}
