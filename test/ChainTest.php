<?php

use Eaybar\DollarDash\DollarDash;
use Eaybar\DollarDash\Chain;

class ChainTest extends TestCase
{

    public function test_chain_instance()
    {
        $this->assertInstanceOf(
            Chain::class,
            DollarDash::chain([1, 2, 3])
        );
    }

    public function test_chain_array_chainable_method()
    {
        $this->assertEquals(
            [1, 1],
            DollarDash::chain([1, 2, 3, 1, 2, 3])
                ->without(2, 3)
                ->value()
        );
    }

    public function test_chain_array_chainable_into_value_method()
    {
        $this->assertEquals(
            1,
            DollarDash::chain([1, 2, 3, 1, 2, 3])
                      ->without(2, 3)
                      ->first()
        );
    }
}