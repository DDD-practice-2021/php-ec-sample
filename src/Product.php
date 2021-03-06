<?php
namespace App;

class Product
{
    private $sku;
    private $base_price;

    /**
     * @param string $sku
     * @param int $base_price
     */
    public function __construct(string $sku, int $base_price)
    {

        $this->sku = $sku;
        $this->base_price = $base_price;
    }

    /**
     * @return int
     */
    public function getBasePrice(): int
    {
        return $this->base_price;
    }

    /**
     * @param int $base_price
     */
    public function setBasePrice(int $base_price): void
    {
        $this->base_price = $base_price;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }
}