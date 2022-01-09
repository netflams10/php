<?php

    use PHPUnit\Framework\TestCase;

    class MockProductTest extends TestCase
    {
        public function testMockProductsAreReturned ()
        {
            $mockRepo = $this->createMock(\App\ProductRepository::class);

            $mockProductsArray = [
                ['id' => 1, 'name' => 'Acme Radio Knobs'],
                ['id' => 2, 'name' => 'Acme Iphone']
            ];

            // we have method function in out mockRepo
            $mockRepo->method('fetchProducts')->willReturn($mockProductsArray);

            $products = $mockRepo->fetchProducts();

            // dd($products);
            $this->assertEquals('Acme Radio Knobs', $products[0]['name']);
        }
    }