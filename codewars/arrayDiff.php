<?php

    function arrayDiff($a, $b) {
        // expecting array index to keep changing ALSO  
        // foreach($b as $value) {
        //     if (in_array($value, $b)) {
        //         $a = array_diff($a, $value);
        //         // unset($a[$index]);
        //     }
        // }
        $latest_array = array();

        foreach ($a as $v) {
            if (!in_array($v, $b)) {
                array_push($latest_array, $v);
            }
        }

        return $latest_array;
    }

    print_r (arrayDiff([1,2,2,2,3],[2]));
    echo "\n";
    print_r(arrayDiff([1,2], [1]));

