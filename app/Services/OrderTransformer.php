<?php
namespace App\Services;

class OrderTransformer
{
    private $currencyConverter;

    public function __construct(CurrencyConverter $currencyConverter)
    {
        $this->currencyConverter = $currencyConverter;
    }

    public function transform(array $orderData): array
    {

        return [
            'id' => $orderData['id'],
            'name' => $orderData['name'],
            'price' => $this->currencyConverter->convert($orderData['price'], $orderData['currency']),
            'currency' => $orderData['currency'],
            'city' => $orderData['address']['city'],
            'district' => $orderData['address']['district'],
            'street' => $orderData['address']['street'],
        ];
    }
}