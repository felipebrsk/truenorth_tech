<?php

namespace Tests\Unit;
use App\Models\Unity;

use PHPUnit\Framework\TestCase;

class UnityTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_unities_columns_are_correctly()
    {
        $user = new Unity;

        $expected = [
            'unity_type',
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
