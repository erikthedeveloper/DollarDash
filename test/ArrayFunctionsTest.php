<?php

use Eaybar\DollarDash\Arr;

class ArrayFunctionsTest extends TestCase
{

    public function test_array_chunk()
    {
        $original = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $chunked = Arr::chunk($original, 3);
        $this->assertCount(4, $chunked);
        $this->assertCount(1, array_pop($chunked));
    }

    public function test_array_compact()
    {
        $original = [0, 1, false, 2, '', 3];
        $compacted = Arr::compact($original);
        $this->assertEquals([1, 2, 3], $compacted);
    }

    function test_array_difference()
    {
        $original_01 = [1, 2, 3, 9];
        $original_02 = [4, 2];
        $original_03 = [4, 9];
        $original_04 = [0, 3];

        $this->assertEquals([1, 3, 9], Arr::difference($original_01, $original_02));
        // Accepts n-number "exclude arrays"
        $this->assertEquals([1, 3], Arr::difference($original_01, $original_02, $original_03));
        $this->assertEquals([1], Arr::difference($original_01, $original_02, $original_03, $original_04));
    }

    public function test_array_drop()
    {
        $this->assertEquals(
            [2, 3],
            Arr::drop([1, 2, 3])
        );

        $this->assertEquals(
            [3],
            Arr::drop([1, 2, 3], 2)
        );

        $this->assertEquals(
            [],
            Arr::drop([1, 2, 3], 5)
        );
    }

    public function test_array_dropRight()
    {
        $this->assertEquals(
            [1, 2],
            Arr::dropRight([1, 2, 3])
        );

        $this->assertEquals(
            [1],
            Arr::dropRight([1, 2, 3], 2)
        );

        $this->assertEquals(
            [],
            Arr::dropRight([1, 2, 3], 5)
        );
    }

    public function test_array_dropRightWhile()
    {
        $this->assertEquals(
            [1],
            Arr::dropRightWhile([1, 2, 3], function ($element) {
                return $element > 1;
            })
        );

        // Now with all 3 arguments in predicate
        $this->assertEquals(
            [0, 1],
            Arr::dropRightWhile([0, 1, 2, 3], function ($element, $index, $array) {
                return $element > 1;
            })
        );
    }

    public function test_array_dropWhile()
    {
        $this->assertEquals(
            [3],
            Arr::dropWhile([1, 2, 3], function ($element) {
                return $element < 3;
            })
        );

        // Now with all 3 arguments in predicate
        $this->assertEquals(
            ['Bill', 'Bob'],
            Arr::dropWhile(['Andrew', 'Yolanda', 'Bill', 'Bob'], function ($element) {
                return substr($element, 0, 1) !== 'B';
            })
        );
    }

}