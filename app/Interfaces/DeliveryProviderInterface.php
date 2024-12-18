<?php

namespace App\Interfaces;

Interface DeliveryProviderInterface
{
    public function calculateShippingCost($weight, $destination):int;
}
