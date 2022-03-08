<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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
                ->subject('Please confirm your new Nummry account.')
                ->greeting('Hello, ' )
                ->line('Thank you so much for signing up for Nummry. ')
                ->line('You can login and access your profile after verify your email.')
                ->line('Please email us at hello@nummry.com if you have any questions. ')
                ->action('Verify Email Address', $url);
        });

        ResetPassword::toMailUsing(function ($notifiable, $url) {
            $url = url('/reset-password/' . $url);
            return (new MailMessage)
                ->subject(Lang::get('Nummry password reset request'))
                ->line(Lang::get('You have requested to reset your Nummry password. Please click below to reset your password. If you didn’t request this, please disregard this email and contact us immediately. '))
                ->action('Reset Password', $url)
                ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]));
        });
    }
}
