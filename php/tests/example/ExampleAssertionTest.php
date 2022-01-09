<?php




class ExampleAssertionTest extends \PHPUnit\Framework\TestCase
{
    public function test_that_string_match (): void
    {
        $string1 = 'testing';
        $string2 = 'testing';
        $string3 = 'Testing';

        $this->assertSame($string1, $string2);
        // $this->assertSame($string1, $string3);
    }
}