<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_category_columns_are_correctly()
    {
        $user = new Category;

        $expected = [
            'category',
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
