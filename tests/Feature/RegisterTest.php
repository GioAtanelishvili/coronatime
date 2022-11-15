<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_authenticated_user_is_redirected_to_dashboard_when_accessing_register_route()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get('/auth/register');

		$response->assertStatus(302)->assertRedirect('/');
	}

	public function test_unauthenticated_user_is_able_to_access_register_page()
	{
		$response = $this->get('/auth/register');

		$response->assertOk()->assertViewIs('register');
	}

	public function test_submitting_form_without_data_triggers_validation_errors()
	{
		$response = $this->post('/auth/register');

		$response->assertSessionHasErrors(['name', 'email', 'password', 'password_confirmation']);
	}

	public function test_submitting_form_with_valid_data_creates_a_new_user()
	{
		$this->post('/auth/register', [
			'name'                  => 'qristefore',
			'email'                 => 'tamunia@gmail.com',
			'password'              => 'tavisufleba',
			'password_confirmation' => 'tavisufleba',
		]);

		$this->assertDatabaseHas('users', [
			'email' => 'tamunia@gmail.com',
		]);
	}

	public function test_submitting_form_with_valid_data_redirects_user_to_verification_notice_page()
	{
		$response = $this->post('/auth/register', [
			'name'                  => 'qristefore',
			'email'                 => 'tamunia@gmail.com',
			'password'              => 'tavisufleba',
			'password_confirmation' => 'tavisufleba',
		]);

		$response->assertStatus(302)->assertRedirect('/email/verify/notification');
	}
}
