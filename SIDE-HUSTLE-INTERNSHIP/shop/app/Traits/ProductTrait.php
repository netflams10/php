<?php

    trait ProductTrait {
        private function create (): array
        {
            $data = [
                'title' => htmlspecialchars($_POST['title']),
                'description' => stripslashes(strip_tags($_POST['description'])),
                'price' => stripslashes($_POST['price'])
            ]
        }


        private function image ()
        {
            getimagesize($_FILES['image']['tmp_name']);
        }
    }