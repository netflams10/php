<?php

    namespace App\Logic;

    class NumberSwap 
    {
        public function number_swap (int $a, int $b)
        {
            list($a, $b) = array($b, $a);
            return $a . " " . $b;
        }

        public function reverse_string (string $sentence)
        {
            return strrev($sentence);
        }
    }