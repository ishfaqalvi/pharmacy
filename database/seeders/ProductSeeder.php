<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/Data/products.json");
        $products = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true);
        foreach ($products as $row) {
            $product = [
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ];
            DB::table('products')->insert($product);
        }
    }
}
