<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Product;
use App\ProductFactory;
use App\Quote;

class QuoteTest extends TestCase
{
    public function test_should_get_price_with_tax_in_us()
    {
        $quote = new Quote();

        $mockRepo = $this->getMockRepo();
        $product = $mockRepo->findBySku('99HAS-123');

        $price = $quote->create()
                        ->addProduct($product)
                        ->setCountry('US')
                        ->getPriceIncludeTax();

        $this->assertEquals(110, $price);
    }

    public function test_should_get_price_with_tax_in_fr()
    {
        $quote = new Quote();

        $mockRepo = $this->getMockRepo();
        $product = $mockRepo->findBySku('99HAS-123');

        $price = $quote->create()
            ->addProduct($product)
            ->setCountry('FR')
            ->getPriceIncludeTax();

        $this->assertEquals(150, $price);
    }

    private function getMockRepo()
    {
        $mockRepo = \Mockery::mock(ProductFactory::class);
        $mockRepo->shouldReceive('findBySku')->andReturn(new Product("99HAS-123", 100));

        return $mockRepo;
    }
}
