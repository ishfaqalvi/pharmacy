<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use DB;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/Data/product_prices.json");
        $prices = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true);
        foreach ($prices as $row) {
            $price = [
                'product_id'=> $row['product_id'],
                'title'     => $row['title'],
                'price'     => $row['price'],
                'discount'  => $row['discount'],
                'default'   => $row['default']
            ];
            DB::table('product_prices')->insert($price);
        }
    }
}
