<?php

namespace App;

class Inventory 
{
    private array $products;

    public function __construct (private ProductRepository $productsRepo)
    {
    }

    public function setProducts ()
    {
        // $productsRepo = new ProductRepository();

        $this->products = $this->productsRepo->fetchProducts();
    }

    public function getProducts (): array
    {
        return $this->products;
    }
}