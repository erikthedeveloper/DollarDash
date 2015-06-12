<?php

use Eaybar\DollarDash\Object;

class ObjectFunctionsTest extends TestCase
{

    public function test_object_assign()
    {
        $this->assertEquals(
            ['user' => 'fred', 'age' => 40],
            Object::assign(['user' => 'barney'], ['age' => 40], ['user' => 'fred'])
        );
    }
}