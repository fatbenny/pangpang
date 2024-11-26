<?php
namespace App\Services;

class CurrencyConverter
{

    private const EXCHANGE_RATES = [
        'TWD' => 1,
        'USD' => 31, // 假設 1 USD = 31 TWD
    ];

    public function convert(float $price, string $currency): float
    {
        $rate = self::EXCHANGE_RATES[$currency];
        return $price * $rate;
    }
}