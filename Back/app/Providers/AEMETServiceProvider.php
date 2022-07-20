<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\AEMET\Domain\Repositories\AEMETInterface;
use Src\AEMET\Infrastructure\API\AEMETAPIRepository;

class AEMETServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AEMETInterface::class, AEMETAPIRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
