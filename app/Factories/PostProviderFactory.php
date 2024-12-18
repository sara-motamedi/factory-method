<?php

namespace App\Factories;

use App\Abstracts\DeliveryProviderFactory;
use App\Interfaces\DeliveryProviderInterface;
use App\Services\PostProvider;

class PostProviderFactory extends DeliveryProviderFactory
{
    /**
     * A unique identifier for the PostProviderFactory.
     *
     * @var string
     */
    public static string $identifier = 'post';

    /**
     * Create an instance of the PostProvider delivery provider.
     *
     * @return DeliveryProviderInterface
     */
    protected function createDelivery(): DeliveryProviderInterface
    {
        return new PostProvider();
    }
}
