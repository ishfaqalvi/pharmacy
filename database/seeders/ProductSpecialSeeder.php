<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategorized;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ProductSpecialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Frequently', 'Featured', 'Wellness', 'Men & Woman'];

        foreach ($types as $type) {
            for ($i = 0; $i < 10; $i++) {
                DB::table('product_categorized')->insert([
                    'product_id' => rand(1, 9000),
                    'type' => $type,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }  
    }
}
