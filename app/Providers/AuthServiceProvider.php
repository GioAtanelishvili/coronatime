<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The model to policy mappings for the application.
	 *
	 * @var array<class-string, class-string>
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		VerifyEmail::toMailUsing(function ($notifiable, $url) {
			return (new MailMessage)
				->subject('Verify Email Address')
				->view('emails.notification', [
					'url'        => $url,
					'heading'    => 'Confirmation email',
					'subheading' => 'click this button to verify your email',
					'button'     => 'VERIFY EMAIL',
				]);
		});

		ResetPassword::toMailUsing(function ($notifiable, $token) {
			return (new MailMessage)
				->subject('Reset Password')
				->view('emails.notification', [
					'url'        => config('app.url') . '/reset-password/' . $token . '?email=' . $notifiable->email,
					'heading'    => 'Recover password',
					'subheading' => 'click this button to recover a password',
					'button'     => 'RECOVER PASSWORD',
				]);
		});
	}
}
