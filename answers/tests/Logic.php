<?php

    class Logic extends \PHPUnit\Framework\TestCase
    {

        /**
         * @group swapNumber
         * return [type] [description]
         */
        public function testNumberSwap ()
        {
            $swap = new App\Logic\NumberSwap;

            $data = explode(" ", $swap->number_swap(5, 4));

            $this->assertEquals(4, $data[0]);
            $this->assertEquals(5, $data[1]);
        }

        /**
         * @group reverse
         * return [type] [description]
         */
        public function testReverseWord ()
        {
            $reverseClass = new App\Logic\NumberSwap;

            $resp = $reverseClass->reverse_string("Hello my nigga");
            
            $result = "aggin ym olleH";

            $this->assertEquals($result, $resp);
            $this->assertIsString($resp);
        }
    }