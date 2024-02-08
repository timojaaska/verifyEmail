<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
            VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
                return (new MailMessage)
                ->subject('Sähköpostin vahvistaminen vaaditaan')
                ->line('Hei, sinun pitää vahvistaa sähköpostiosoitteesi ennen palvelun käyttöä. Ole hyvä ja paina vahvista painiketta.')
                ->action('Vahvista sähköposti', $url);
            });
    }
}
