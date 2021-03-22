<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Image;

class ImageTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_images_columns_are_correctly()
    {
        $user = new Image;

        $expected = [
            'image',
            'product_id',
        ];

        $arrayCompare = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompare));
    }
}
