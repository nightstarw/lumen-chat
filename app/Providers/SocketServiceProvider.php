<?php
namespace App\Providers;

use App\Services\Socket;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

/**
 * socket service provider
 * Class SocketServiceProvider
 * @package App\Providers
 */
class SocketServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Socket::class, function($app) {
            return new Socket();
        });
    }
}