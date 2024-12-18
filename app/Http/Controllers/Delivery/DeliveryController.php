<?php

namespace App\Http\Controllers\Delivery;

use App\Abstracts\DeliveryProviderFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryShowRequest;
use App\Http\Requests\ShowDeliveryRequest;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class DeliveryController extends Controller
{
    /**
     * The delivery provider factory instance.
     *
     * This is used to create a specific delivery provider and calculate the shipping cost.
     *
     * @var DeliveryProviderFactory
     */
    protected DeliveryProviderFactory $deliveryProviderFactory;

    /**
     * DeliveryController constructor.
     *
     * Initializes the controller with a delivery provider factory instance.
     *
     * @param DeliveryProviderFactory $deliveryProviderFactory An instance of the delivery provider factory.
     */
    public function __construct(DeliveryProviderFactory $deliveryProviderFactory)
    {
        $this->deliveryProviderFactory = $deliveryProviderFactory;
    }

    /**
     * Display the shipping cost for a given weight, destination, and delivery type.
     *
     * This method accepts a request to calculate the shipping cost based on the provided
     * weight, destination, and delivery type. It then returns the shipping cost in a JSON response.
     *
     * @param ShowDeliveryRequest $request The incoming request containing weight, destination, and type.
     *
     * @return JsonResponse A JSON response containing the shipping cost and type.
     *
     * @throws InvalidArgumentException If the delivery provider cannot process the request.
     */
    public function show(ShowDeliveryRequest $request): JsonResponse
    {
        $weight = $request->input('weight');

        $destination = $request->input('destination');

        $type = $request->input('type');

        try {
            $factory = $this->deliveryProviderFactory->delivery($weight, $destination);

            return response()->json([
                'type' => $type ?? 'post',
                'cost' => $factory,
            ]);
        } catch (InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
