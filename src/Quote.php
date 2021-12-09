<?php

namespace App;

class Quote
{

    private $product;

    public function __construct()
    {
    }

    public function create()
    {
        return $this;
    }

    public function addProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function getQuotePrice()
    {
        return $this->product->getPriceIncludeTax();
    }
}