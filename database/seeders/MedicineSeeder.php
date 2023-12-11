<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*----------------------------------------------------------------------*/
        /*                        BABY CARE PRODUCTS                            */
        /*----------------------------------------------------------------------*/
        $baby_care_json = File::get(database_path('Products/Baby Care.json'));
        foreach (json_decode($baby_care_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        HEALTH CARE DEVICES                           */
        /*----------------------------------------------------------------------*/
        $health_care_device_json = File::get(database_path('Products/Health Care Devices.json'));
        foreach (json_decode($health_care_device_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        LIFE STYLE                                    */
        /*----------------------------------------------------------------------*/
        $life_style_json = File::get(database_path('Products/Life Style.json'));
        foreach (json_decode($health_care_device_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 0                                    */
        /*----------------------------------------------------------------------*/
        $medicines_0_json = File::get(database_path('Products/Medicines 0.json'));
        foreach (json_decode($medicines_0_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 1                                    */
        /*----------------------------------------------------------------------*/
        $medicines_1_json = File::get(database_path('Products/Medicines 1.json'));
        foreach (json_decode($medicines_1_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 2                                    */
        /*----------------------------------------------------------------------*/
        $medicines_2_json = File::get(database_path('Products/Medicines 2.json'));
        foreach (json_decode($medicines_2_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 3                                    */
        /*----------------------------------------------------------------------*/
        $medicines_3_json = File::get(database_path('Products/Medicines 3.json'));
        foreach (json_decode($medicines_3_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 4                                    */
        /*----------------------------------------------------------------------*/
        $medicines_4_json = File::get(database_path('Products/Medicines 4.json'));
        foreach (json_decode($medicines_4_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 5                                    */
        /*----------------------------------------------------------------------*/
        $medicines_5_json = File::get(database_path('Products/Medicines 5.json'));
        foreach (json_decode($medicines_5_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 6                                    */
        /*----------------------------------------------------------------------*/
        $medicines_6_json = File::get(database_path('Products/Medicines 6.json'));
        foreach (json_decode($medicines_6_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        MEDICINES 7                                    */
        /*----------------------------------------------------------------------*/
        $medicines_7_json = File::get(database_path('Products/Medicines 7.json'));
        foreach (json_decode($medicines_7_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        ORGANIC                                       */
        /*----------------------------------------------------------------------*/
        $organic_json = File::get(database_path('Products/Organic.json'));
        foreach (json_decode($organic_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }

        /*----------------------------------------------------------------------*/
        /*                        PERSONAL CARE                                 */
        /*----------------------------------------------------------------------*/
        $personal_care_json = File::get(database_path('Products/Personal Care.json'));
        foreach (json_decode($personal_care_json, true) as $row) {
            $product = Product::create([
                'brand_id'          => $row['brand_id'],
                'category_id'       => $row['category_id'],
                'sub_category_id'   => $row['sub_category_id'],
                'name'              => $row['name'],
                'formula'           => $row['formula'],
                'description'       => $row['description'],
                'thumbnail'         => $row['thumbnail'],
                'quantity'          => $row['quantity'],
                'rating'            => $row['rating'],
                'in_stock'          => $row['in_stock']
            ]);
            foreach($row['prices'] as $price){
                $product->prices()->create([
                    'price' => $price['price'],
                    'title' => $price['title'],
                    'default' => $price['default'],
                ]);
            }
        }
    }
}