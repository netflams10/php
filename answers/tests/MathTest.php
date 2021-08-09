<?php


    class MathTest extends \PHPUnit\Framework\TestCase
    {

        /**
         * @group divide
         * return [type] [description]
         */
        public function testThatStringMatch()
        {
            $div = new App\Math\Division;

            $int = $div->divide_two_number(6, 3);
            $float = $div->divide_two_number(7, 3);

            $this->assertIsInt($int);
            $this->assertIsFloat($float);
        }

        /**
         * @group multiple
         * return [type] [description]
         */
        public function testForMultiples ()
        {
            $multiple = new App\Math\OtherLogic;

            $result = $multiple->multiples_of_seven(7);

            $this->assertIsArray($result);
            $this->assertContains(21, $result);
        }

        /**
         * @group multiplication_table
         * return [type] [description]
         */
        public function test_mulltiplication_table()
        {
            $getClass = new App\Math\Math;

            $getClass->multiplication_table(4);

            $this->assertIsArray($getClass);
            $this->assert()
        }

    }
    
        