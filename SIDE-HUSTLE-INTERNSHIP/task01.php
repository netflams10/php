<?php

    /**
     * @rangeFunc (start, end)
     * return array of list from start to end including end
     */
    function rangeFunc (int $start, int $end): array
    {
        $result = array();
        for ($i = $start; $i <= $end; $i++) {
            array_push($result, $i);
        }
        return $result;
    }


    /**
     * @sumArr ($number)
     * params [array] -->> restricted it to an array...
     */
    function sumArrTest2 (array $number): int
    {
        $max = 0;
        foreach ($number as $i) {
            $max  = $max + $i;
        }
        return $max;
    }

    echo '\n';
    print_r(rangeFunc(5, 9));

    echo '\n';
    print_r(sumArrTest2(array(5, 4, 3, 8, 9)));