<?php

    function arrayDiff($a, $b) {
        // expecting array index to keep changing ALSO  
        // foreach($b as $value) {
        //     if (in_array($value, $b)) {
        //         $a = array_diff($a, $value);
        //         // unset($a[$index]);
        //     }
        // }

        return array_diff($a, $b);
    }

    print_r (arrayDiff([1,2,2,2,3],[2]));
    echo "\n";
    print_r(arrayDiff([1,2], [1]));