<?php

    class TestClass {
        public $number;

        public function __construct ($number)
        {
            $this->number = ++$number;
        }

        public function getNumber () {
            return ++$this->number;
        }
    }

    $test = new TestClass(2);
    echo $test->getNumber() . "\n";