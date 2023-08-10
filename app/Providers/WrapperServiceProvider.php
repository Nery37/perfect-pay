<?php

declare(strict_types=1);

namespace App\Providers;

use App\Wrappers\Asaas\AsaasGateway;
use App\Wrappers\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class WrapperServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGatewayInterface::class, AsaasGateway::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }
}
