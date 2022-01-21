<?php
    require_once "DBConnect.php";
    require_once "Traits/ProductTrait.php";

    class Shop extends DBConnect {
        use ProductTrait;

        public function __construct()
        {
            parent::__construct();
        }

        public function getAllProducts ()
        {
            return "all Produxcts";
        }

        public function createProduct()
        {
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";

            echo "<pre>";
            print_r($_FILES['image']);
            echo "</pre>";

            return "status of creation";
        }

        public function updateProduct ()
        {
            return "Update Product";
        }

        public function deleteProduct()
        {
            return "Delete Single Product";
        }
    }

    $shop = new Shop();