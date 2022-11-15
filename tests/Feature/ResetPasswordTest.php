<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_authenticated_user_is_redirected_to_dashboard_when_accessing_forgot_password_route()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get('/forgot-password');

		$response->assertStatus(302)->assertRedirect('/');
	}

	public function test_unauthenticated_user_is_able_to_access_forgot_password_page()
	{
		$response = $this->get('/forgot-password');

		$response->assertOk()->assertViewIs('forgot-password');
	}

	public function test_submitting_email_form_without_data_triggers_validation_errors()
	{
		$response = $this->post('/forgot-password');

		$response->assertSessionHasErrors(['email']);
	}

	public function test_submitting_valid_email_form_redirects_user_to_email_notification_page()
	{
		Notification::fake();

		User::factory()->create([
			'email' => 'peri@gmail.com',
		]);

		$response = $this->post('/forgot-password', [
			'email' => 'peri@gmail.com',
		]);

		$response->assertStatus(302)->assertRedirect('/forgot-password/notification');
	}

	public function test_submitting_valid_email_form_sends_reset_password_notification_to_user()
	{
		Notification::fake();

		$user = User::factory()->create([
			'email' => 'peri@gmail.com',
		]);

		$this->post('/forgot-password', [
			'email' => 'peri@gmail.com',
		]);

		Notification::assertSentTo([$user], ResetPassword::class);
	}

	public function test_notification_link_redirects_user_to_reset_password_page()
	{
		$response = $this->get('/reset-password/token?email=peri@gmail.com');

		$response->assertStatus(200)->assertViewIs('reset-password');
	}

	public function test_user_is_unable_to_reset_password_with_invalid_token()
	{
		$user = User::factory()->create([
			'email'    => 'peri@gmail.com',
			'password' => 'portaturi',
		]);

		Password::createToken($user);

		$this->patch('/reset-password', [
			'token'                 => 'invalid_token',
			'email'                 => 'peri@gmail.com',
			'password'              => 'aguli123',
			'password_confirmation' => 'aguli123',
		]);

		$this->assertFalse(Hash::check('aguli123', $user->fresh()->password));
		$this->assertTrue(Hash::check('portaturi', $user->fresh()->password));
	}

	public function test_user_is_able_to_reset_password()
	{
		$user = User::factory()->create([
			'email'    => 'peri@gmail.com',
			'password' => 'portaturi',
		]);

		$token = Password::createToken($user);

		$this->patch('/reset-password', [
			'token'                 => $token,
			'email'                 => 'peri@gmail.com',
			'password'              => 'aguli123',
			'password_confirmation' => 'aguli123',
		]);

		$this->assertFalse(Hash::check('portaturi', $user->fresh()->password));
		$this->assertTrue(Hash::check('aguli123', $user->fresh()->password));
	}
}
