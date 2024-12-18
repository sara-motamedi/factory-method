<?php

namespace App\Services;

use App\Interfaces\DeliveryProviderInterface;

class SnappProvider implements DeliveryProviderInterface
{
    /**
     * Calculate the shipping cost based on weight and destination.
     *
     * @param int $weight The weight of the item to be delivered.
     * @param int $destination The destination of the delivery.
     *
     * @return int The calculated shipping cost.
     */
    public function calculateShippingCost($weight, $destination): int
    {
        return $weight * $destination * 12;

    }
}
