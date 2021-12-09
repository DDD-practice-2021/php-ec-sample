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
//        $mockRepo = \Mockery::mock(ProductFactory::class);
//        $mockRepo->shouldReceive('findBySku')->andReturn(new Product("99HAS-123", 100));
        $mockRepo = $this->getMockRepo();

        $product = $mockRepo->findBySku('99HAS-123');
        $price = $quote->create()
                        ->addProduct($product)
                        ->setCountry('US')
                        ->setTax(0.1)
                        ->getPrice();

        $this->assertEquals(110, $price);
    }

    private function getMockRepo()
    {
        $mockRepo = \Mockery::mock(ProductFactory::class);
        $mockRepo->shouldReceive('findBySku')->andReturn(new Product("99HAS-123", 100));

        return $mockRepo;
    }
}
