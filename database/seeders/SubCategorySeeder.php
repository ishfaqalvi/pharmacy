<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            ['category_id' => 1, 'name' => 'Musculo Skeletal System'      ],
            ['category_id' => 1, 'name' => 'Parasitology'                 ],
            ['category_id' => 1, 'name' => 'Alimentary Tract & Metabolism'],
            ['category_id' => 1, 'name' => 'Anti Infective'               ],
            ['category_id' => 1, 'name' => 'Sensory Organs'               ],
            ['category_id' => 1, 'name' => 'Immunomodulator'              ],
            ['category_id' => 1, 'name' => 'Hormones'                     ],
            ['category_id' => 1, 'name' => 'Cytostatic'                   ],
            ['category_id' => 1, 'name' => 'Blood & Blood forming Organs' ],
            ['category_id' => 2, 'name' => 'Baby Nutrition'               ],
            ['category_id' => 2, 'name' => 'Baby Bath'                    ],
            ['category_id' => 2, 'name' => 'Baby Essentials'              ],
            ['category_id' => 3, 'name' => 'Hair & Nail Care'             ],
            ['category_id' => 3, 'name' => 'Oral Hygiene'                 ],
            ['category_id' => 3, 'name' => 'Skin care'                    ],
            ['category_id' => 4, 'name' => 'Herbal Care'                  ],
            ['category_id' => 4, 'name' => 'Homeopathic'                  ],
            ['category_id' => 4, 'name' => 'Organic Health'               ],
            ['category_id' => 5, 'name' => 'Daily Well being'             ],
            ['category_id' => 5, 'name' => 'Elder Care'                   ],
            ['category_id' => 5, 'name' => 'Mens Health'                  ],
            ['category_id' => 5, 'name' => 'Womens Health'                ],
            ['category_id' => 6, 'name' => 'Medical Equipment'            ],
            ['category_id' => 6, 'name' => 'Hospital Supplies'            ],
            ['category_id' => 6, 'name' => 'Supports & Braces'            ]
        ]);
    }
}
