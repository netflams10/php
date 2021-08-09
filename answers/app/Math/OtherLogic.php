<?php

    namespace App\Math;

    class OtherLogic 
    {
        public function multiples_of_seven () : array
        {
            $new_array = array();
            $i = 7;
            /** -- Recursion is going to be slow for this -- */
            while ($i < 1000) {
                array_push($new_array, $i);
                $i = $i + 7;
            }
            /** print_r($new_array) ==>> print on every New Line in Terminal */
            return $new_array;
        }
    }