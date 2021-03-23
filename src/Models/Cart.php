<?php

namespace App\Models;

class Cart
{
    /** @var array<Product> $products */
    public array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function totalPrice() : float
    {
        return (float) array_reduce($this->products, static fn ($c, $i) => $c + $i->price, 0);
    }

    public function categoriesCount() : array
    {
        $values = array_map(static fn ($i) => $i->category, $this->products);

        return array_count_values($values);
    }

    public function push(Product $product) : void
    {
        $this->products[] = $product;
    }
}