<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class Product2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/products2.json");
        $products = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true);
        foreach ($products as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'composition_id'    => Null,
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $row2){
                $product->prices()->create([
                    'title'     => $row2['title'],
                    'old_price' => $row2['old_price'],
                    'new_price' => $row2['new_price'],
                    'discount'  => 0,
                    'default'   => $row2['default']
                ]);
            }
        }
    }
}
