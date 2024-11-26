<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;

class OrderValidator
{
    public function validate(array $orderData): void
    {
        $this->checkName($orderData['name']);
        $this->checkPrice($orderData['price']);
        $this->checkCurrency($orderData['currency']);
    }

    private function checkName(string $name): void
    {
        if (!preg_match('/^[A-Za-z\s]+$/', $name)) {
            throw ValidationException::withMessages(['Name' => 'Name contains non-English characters']);
        }
        $words = explode(' ', $name);
        foreach ($words as $word) {
            if (ucwords($word) !== $word) {
                throw ValidationException::withMessages(['Name' => 'Name is not capitalized']);
            }
        }
    }

    private function checkPrice(float $price): void
    {
        if ($price > 2000) {
            throw ValidationException::withMessages(['Price' => 'Price is over 2000']);
        }
        if ($price <= 0) {
            throw ValidationException::withMessages(['Price' => 'Invalid price']);
        }
    }

    private function checkCurrency(string $currency): void
    {
        if (!in_array($currency, ['TWD', 'USD'])) {
            throw ValidationException::withMessages(['Currency' => 'Currency format is wrong']);
        }
    }
}