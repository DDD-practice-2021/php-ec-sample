<?php

namespace App;

class Quote
{

    private $product;

    /**
     * @var string
     */
    private $country;
    /**
     * @var float
     */
    private $tax;

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

    public function setCountry(string $country)
    {
        $this->country = new Country($country);

        return $this;
    }

    public function getPriceIncludeTax()
    {
        return $this->product->getBasePrice() + $this->product->getBasePrice() * $this->country->getTax();
    }
}