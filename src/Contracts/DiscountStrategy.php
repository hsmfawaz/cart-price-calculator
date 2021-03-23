<?php

namespace App\Contracts;

interface DiscountStrategy
{
    public function calculate(float $price) : float;
}