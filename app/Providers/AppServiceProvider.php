<?php

declare(strict_types=1);

namespace App\Providers;

use App\Clients\ClientHttp;
use App\Clients\Interfaces\ClientHttpInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ClientHttpInterface::class, ClientHttp::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }
}
