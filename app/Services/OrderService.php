<?php

namespace App\Services;

use App\Services\OrderValidator;
use App\Services\OrderTransformer;

class OrderService
{
    private $validator;
    private $transformer;

    public function __construct(OrderValidator $validator, OrderTransformer $transformer)
    {
        $this->validator = $validator;
        $this->transformer = $transformer;
    }

    public function processOrder(array $orderData): array
    {
        $this->validator->validate($orderData);
        return $this->transformer->transform($orderData);
    }
}