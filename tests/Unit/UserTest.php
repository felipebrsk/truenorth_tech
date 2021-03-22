<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_users_columns_are_correctly()
    {
        $user = new User;

        $expected = [
            'name',
            'email',
            'password',
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
