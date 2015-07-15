<?php

use Eaybar\DollarDash\Collection;

class CollectionFunctionsTest extends TestCase
{

    public function test_collection_every()
    {
        $this->assertTrue(
            Collection::every([2, 4, 6], function ($item) {
                return $item > 1;
            })
        );

        $this->assertFalse(
            Collection::every([2, 4, 6, 7], function ($item) {
                return $item > 6;
            })
        );

        $this->assertFalse(
            Collection::every([9, 2, 4, 6], function ($item) {
                return $item > 6;
            })
        );
    }

    public function test_collection_every_has_alias_all()
    {
        $this->assertTrue(
            Collection::all([2, 4, 6], function ($item) {
                return $item > 1;
            })
        );
    }

    public function test_collection_some()
    {
        $this->assertTrue(
            Collection::some([2, 3, 6], function ($item) {
                return $item < 3;
            })
        );

        $this->assertFalse(
            Collection::some([2, 3, 6], function ($item) {
                return $item > 6;
            })
        );
    }

    public function test_collection_some_has_alias_any()
    {
        $this->assertTrue(
            Collection::any([2, 3, 6], function ($item) {
                return $item < 3;
            })
        );
    }
}
