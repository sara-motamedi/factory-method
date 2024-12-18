<?php

namespace App\Abstracts;

use App\Interfaces\DeliveryProviderInterface;

abstract class DeliveryProviderFactory
{
    /**
     * Calculate the shipping cost based on the weight and destination.
     *
     * @param int $weight The weight of the item to be delivered (in kilograms).
     * @param int $destination The destination of the delivery (typically an identifier for a location or region).
     *
     * @return int The calculated shipping cost.
     */
    public function delivery(int $weight, int $destination): int
    {
        $delivery = $this->createDelivery();

        return $delivery->calculateShippingCost($weight, $destination);

    }

    /**
     * Create a specific delivery provider instance.
     *
     * @return DeliveryProviderInterface
     */
    abstract protected function createDelivery(): DeliveryProviderInterface;
}
