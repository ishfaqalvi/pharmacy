<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Medicines',          'logo' => 'images/category/1.webp'],
            ['name' => 'Baby Care',          'logo' => 'images/category/2.webp'],
            ['name' => 'Personal Care',      'logo' => 'images/category/3.webp'],
            ['name' => 'Organic',            'logo' => 'images/category/4.webp'],
            ['name' => 'Lifestyle & Fitness','logo' => 'images/category/5.webp'],
            ['name' => 'Healthcare Devices', 'logo' => 'images/category/6.jpeg']
        ]);
    }
}