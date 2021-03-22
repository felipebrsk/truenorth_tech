<?php

namespace Tests\Unit;
use App\Models\Type;

use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_types_columns_are_correctly()
    {
        $user = new Type;

        $expected = [
            'type',
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
