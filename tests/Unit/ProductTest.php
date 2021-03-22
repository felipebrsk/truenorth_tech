<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_products_columns_are_correctly()
    {
        $product = new Product;

        $expected = [
            'product',
            'subtitle',
            'brand',
            'model',
            'year',
            'capacity',
            'screen_size',
            'connection_type',
            'screen_functionality',
            'screen_type',
            'resolution',
            'weight',
            'dimension',
            'charging',
            'need_battery',
            'included_battery',
            'time_on',
            'included_charger',
            'RAM',
            'way_use',
            'waterproof',
            'compatibility',
            'price',
            'estoque',
            'new',
            'best_seller',
            'current_inventory',
            'image',
            'description',
            'search_helper',
            'category_id',
            'unity_id',
            'type_id',
            'image_id',
        ];

        $arrayCompare = array_diff($expected, $product->getFillable());
        
        $this->assertEquals(0, count($arrayCompare));
    }
}
