<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Set SMTP configuration for external domain
        Config::set('mail.default', 'smtp');
        Config::set('mail.mailers.smtp', [
            'transport' => 'smtp',
            'host' => 'mail.cw-omargamal.com',
            'port' => 465,
            'encryption' => 'ssl',
            'username' => 'omar@cw-omargamal.com',
            'password' => 'A123a132#@!',
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ]);
        
        Config::set('mail.from', [
            'address' => 'omar@cw-omargamal.com',
            'name' => 'Omar Gamal - Copywriter',
        ]);
    }
}