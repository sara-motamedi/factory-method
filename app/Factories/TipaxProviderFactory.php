<?php

namespace App\Factories;

use App\Abstracts\DeliveryProviderFactory;
use App\Services\TipaxProvider;
use \App\Interfaces\DeliveryProviderInterface;

class TipaxProviderFactory extends DeliveryProviderFactory
{
    /**
     * A unique identifier for the TipaxProviderFactory.
     *
     * @var string
     */
    public static string $identifier = 'tipax';

    /**
     * Create an instance of the TipaxProvider delivery provider.
     *
     * @return DeliveryProviderInterface
     */
    protected function createDelivery(): DeliveryProviderInterface
    {
        return new TipaxProvider();
    }
}
