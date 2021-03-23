<?php

namespace App\Models;

class Product
{
    public float $price;

    public string $category;

    public function __construct(float $price, string $category)
    {
        $this->price = $price;
        $this->category = $category;
    }
}