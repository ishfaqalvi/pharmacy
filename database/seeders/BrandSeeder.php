<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['name' => 'Brand 1', 'logo' => 'images/brand/brand-1.png'],
            ['name' => 'Brand 2', 'logo' => 'images/brand/brand-2.png'],
            ['name' => 'Brand 3', 'logo' => 'images/brand/brand-3.png'],
            ['name' => 'Brand 4', 'logo' => 'images/brand/brand-4.png'],
            ['name' => 'Brand 5', 'logo' => 'images/brand/brand-5.png'],
            ['name' => 'Brand 6', 'logo' => 'images/brand/brand-6.png']
        ]);
    }
}
