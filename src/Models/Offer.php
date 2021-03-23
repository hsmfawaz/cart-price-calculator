<?php

namespace App\Models;

use App\Contracts\DiscountStrategy;

class Offer
{
    /** @var array<string,int> $rules */
    public array $rules;

    /**
     * @var \App\Contracts\DiscountStrategy
     */
    public DiscountStrategy $strategy;

    /**
     * Offer constructor.
     *
     * @param  array<string,int>  $rules
     * @param  \App\Contracts\DiscountStrategy  $strategy
     */
    public function __construct(array $rules, DiscountStrategy $strategy)
    {
        $this->rules = $rules;
        $this->strategy = $strategy;
    }

    public function applicable(array $categoriesCount) : bool
    {
        $applicableCategories = array_filter($categoriesCount,
            fn ($category) => array_key_exists($category, $this->rules), ARRAY_FILTER_USE_KEY);
    }

    public function push(string $name, int $count) : void
    {
        $this->rules[$name] = $count;
    }
}