<?php

namespace App\Providers;

use App\Abstracts\DeliveryProviderFactory;
use App\Factories\PostProviderFactory;
use App\Factories\SnappProviderFactory;
use App\Factories\TipaxProviderFactory;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class DeliveryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $factories = [
            PostProviderFactory::$identifier => PostProviderFactory::class,
            SnappProviderFactory::$identifier => SnappProviderFactory::class,
            TipaxProviderFactory::$identifier => TipaxProviderFactory::class,
        ];

        $this->app->bind(DeliveryProviderFactory::class, function ($app) use ($factories) {
            $type = request('type');

            if(is_null($type)){
                $type = "post";
                return $app->make($factories[$type]);
            }

            if(!array_key_exists($type, $factories)){
                throw new InvalidArgumentException("$type is not a valid delivery provider.");
            }

            return $app->make($factories[$type]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
