<?php

namespace App\Services;

use App\Contracts\DiscountStrategy;

class PercentDiscountStrategy implements DiscountStrategy
{
    public float $percent;

    public function __construct(float $discountPercent)
    {
        if ($discountPercent < 0 || $discountPercent > 100) {
            throw new \InvalidArgumentException("Discount Percent must be value from 0 to 100");
        }
        $this->percent = $discountPercent;
    }

    public function calculate(float $price) : float
    {
        return $price - ($price * ($this->percent / 100));
    }
}