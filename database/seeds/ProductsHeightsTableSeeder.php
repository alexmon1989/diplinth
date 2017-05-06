<?php

use Illuminate\Database\Seeder;
use App\ProductHeight;

class ProductsHeightsTableSeeder extends Seeder
{
    public $data = [
        [5, 60, 55, true],
        [5, 80, 71, true],

        [8, 60, 55, true],
        [8, 80, 71, true],

        [4, 60, 70, true],
        [4, 80, 90, true],

        [3, 60, 70, true],
        [3, 80, 90, true],

        [2, 60, 70, true],
        [2, 80, 90, true],

        [1, 60, 70, true],
        [1, 80, 90, true],

        [7, 60, 70, true],
        [7, 80, 90, true],

        [14, 60, 70, true],
        [14, 80, 90, true],

        [9, 60, 70, true],
        [9, 80, 90, true],

        [10, 60, 70, true],
        [10, 80, 90, true],

        [19, 60, 70, true],
        [19, 80, 90, true],

        [18, 60, 70, true],
        [18, 80, 90, true],

        [12, 60, 70, true],
        [12, 80, 90, true],

        [13, 60, 70, true],
        [13, 80, 90, true],

        [20, 60, 70, true],
        [20, 80, 90, true],

        [16, 60, 81, true],
        [16, 80, 103, true],

        [17, 60, 81, true],
        [17, 80, 103, true],

        [6, 60, 81, true],
        [6, 80, 103, true],

        [15, 60, 81, true],
        [15, 80, 103, true],

        [21, 60, 81, true],
        [22, 80, 103, true],
    ];

    public function run()
    {
        ProductHeight::truncate();

        foreach ($this->data as $value) {
            $productHeight = new ProductHeight;
            $productHeight->product_id = $value[0];
            $productHeight->value = $value[1];
            $productHeight->price = $value[2];
            $productHeight->available = $value[3];
            $productHeight->save();
        }
    }
}
