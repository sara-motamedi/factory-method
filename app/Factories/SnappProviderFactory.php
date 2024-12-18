<?php

namespace App\Factories;

use App\Abstracts\DeliveryProviderFactory;
use App\Services\SnappProvider;
use \App\Interfaces\DeliveryProviderInterface;

class SnappProviderFactory extends DeliveryProviderFactory
{
    /**
     * A unique identifier for the SnappProviderFactory.
     *
     * @var string
     */
    public static string $identifier = 'snapp';

    /**
     * Create an instance of the SnappProvider delivery provider.
     *
     * @return DeliveryProviderInterface
     */
    protected function createDelivery(): DeliveryProviderInterface
    {
        return new SnappProvider();
    }
}
