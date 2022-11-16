<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class VerifyEmailTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_is_unable_to_verify_non_existing_email_address()
	{
		$uri = URL::signedRoute(
			'verification.verify',
			[
				'id'   => 1,
				'hash' => sha1('ertaozi@gmail.com'),
			]
		);

		$resposne = $this->get($uri);

		$resposne->assertStatus(403);
	}

	public function test_user_is_unable_to_verify_email_address_without_valid_hash()
	{
		$user = User::factory()->create([
			'email'             => 'ertaozi@gmail.com',
			'email_verified_at' => null,
		]);

		$uri = URL::signedRoute(
			'verification.verify',
			[
				'id'   => $user->getKey(),
				'hash' => 'invalid_hash',
			]
		);

		$resposne = $this->get($uri);

		$this->assertFalse($user->fresh()->hasVerifiedEmail());

		$resposne->assertStatus(403);
	}

	public function test_user_is_able_to_verify_email_address()
	{
		$user = User::factory()->create([
			'email'             => 'ertaozi@gmail.com',
			'email_verified_at' => null,
		]);

		$uri = URL::signedRoute(
			'verification.verify',
			[
				'id'   => $user->getKey(),
				'hash' => sha1($user->getEmailForVerification()),
			]
		);

		$resposne = $this->get($uri);

		$this->assertTrue($user->fresh()->hasVerifiedEmail());

		$resposne->assertStatus(302)->assertRedirect('/auth/login');
	}
}
