<?php

    namespace App\Math;

    class Math
    {
        public function add (int $a, int $b): int
        {
            return $a + $b;
        }

        public function subtract (int $a, int $b): int
        {
            return $a - $b;
        }

        public function multiply (int $a, int $b) : int
        {
            return $a * $b;
        }

        /** -- [$number . "*" . $i . "=" . $number * $i] -- */
        public function multiplication_table (int $number)
        {
            $table = array();
            /** -- table of 12 -- */
            for ($i = 1; $i <= 12; $i++) {
                array_push($table, [$number . "*" . $i . "=" . $number * $i]);
            }
            return $table;
        }
    }