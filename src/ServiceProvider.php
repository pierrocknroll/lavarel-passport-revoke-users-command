<?php

namespace Pierrocknroll\LavarelPassportRevokeUsersCommand;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->commands([
            Console\Commands\RevokeTokens::class,
        ]);
    }
}
