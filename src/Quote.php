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
        $this->country = $country;
        return $this;
    }

//    public function setTax(float $rate)
//    {
//        $this->tax = $rate;
//        return $this;
//    }

    public function getPrice()
    {
        $this->country = new Country($this->country);
//        $this->tax = $this->country->getTax();

        return $this->product->getBasePrice() + $this->product->getBasePrice() * $this->country->getTax();
    }
}