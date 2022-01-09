<?php

    namespace App;

    use PHPUnit\Framework\TestCase;

    class InventoryTest extends TestCase
    {
        /** @group db
         * 
         *  --group test-group-name
         */
        public function testProductsCanBeSet ()
        {
            // Setup
            $mockRepo = $this->createMock(\App\ProductRepository::class);
            
            $inventory = new \App\Inventory($mockRepo);

            $mockProducttsArray = [
                ['id' => 1, 'name' => 'Acme Radio Knobs'],
                ['id' => 2, 'name' => 'Acme Iphone']
            ];

            $mockRepo->method('fetchProducts')->willReturn($mockProducttsArray);

            // method called only once
            $mockRepo->expects($this->once())->method('fetchProducts')->willReturn($mockProducttsArray);
            $mockRepo->expects($this->exactly(1))->method('fetchProducts')->willReturn($mockProducttsArray);

            // Do something
            $inventory->setProducts();

            dd($inventory->getProducts());

            // Make Assertions
            $this->assertEquals('Acme Radio Knobs', $inventory->getProducts()[0]['name']);
            $this->assertEquals('Acme Iphone', $inventory->getProducts()[1]['name']);
        }
    }