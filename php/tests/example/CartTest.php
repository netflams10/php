<?php

use App\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    protected $cart;

    protected function setUp (): void
    {
        // parent::setUp();
        $this->cart = new Cart();
    }

    // method that reset our systems after test is run
    protected function tearDown(): void
    {
        // reset the static property to 1.2 incase second test comes first
        Cart::$tax = 1.2;
    }

    public function test_correct_net_price_is_returned ()
    {
        $this->cart->price = 10;

        $netPrice = $this->cart->getNetPrice();

        $this->assertEquals(12, $netPrice);
    }

    /** @test */
    public function the_cart_value_tax_can_be_changed_statically ()
    {
        Cart::$tax = 1.5;

        $this->cart->price = 10;

        $netPrice = $this->cart->getNetPrice();

        $this->assertEquals(15, $netPrice);
    }

    /** @test */
    public function a_type_error_is_thrown_when_trying_to_add_non_int_to_the_price ()
    {
        // $this->expectException(TypeError::class);
        // $this->cart->addToPrice('fifteen');
        try {
            $this->cart->addToPrice('fifteen');

            $this->fail('A TypeError should have been thrown');
        } catch (TypeError $error) {
            $this->assertStringStartsWith('Argument 1 passed to App\Cart::addToPrice()', $error->getMessage());
            // dd($error);
        }
    }
}