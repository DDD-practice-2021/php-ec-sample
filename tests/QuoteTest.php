<?php

namespace Tests;

use App\PriceCalculator;
use PHPUnit\Framework\TestCase;
use App\Product;
use App\ProductFactory;
use App\Quote;

class QuoteTest extends TestCase
{
    public function test_should_get_price_with_tax_in_us()
    {
        $quote = new Quote();
        $product = $this->getMockProduct($this->getMockRepo(), 'US');

        $price = $quote->create()
                        ->addProduct($product)
                        ->getQuotePrice();

        $this->assertEquals(110, $price);
    }

    public function test_should_get_price_with_tax_in_fr()
    {
        $quote = new Quote();
        $product = $this->getMockProduct($this->getMockRepo(), 'FR');

        $price = $quote->create()
            ->addProduct($product)
            ->getQuotePrice();

        $this->assertEquals(150, $price);
    }

    private function getMockRepo()
    {
        $mockRepo = \Mockery::mock(ProductFactory::class);
        $mockRepo->shouldReceive('findBySku')->andReturn(new Product("99HAS-123", 100));

        return $mockRepo;
    }

    /**
     * @param $mockRepo
     * @param $country
     * @return mixed
     */
    public function getMockProduct($mockRepo, $country)
    {
        $product = $mockRepo->findBySku('99HAS-123');
        $product->setCountry($country)
            ->getPriceIncludeTax();
        return $product;
    }
}
