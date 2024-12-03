<?php

namespace App\Service;

class DiscountCalculator
{
    public function calculate(float $price, float $discountPercentage): float
    {
        if ($price < 0 || $discountPercentage < 0 || $discountPercentage > 100) {
            throw new \InvalidArgumentException('Invalid price or discount percentage');
        }

        return $price - ($price * $discountPercentage / 100);
    }
}
