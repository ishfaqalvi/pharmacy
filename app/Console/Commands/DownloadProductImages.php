<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\DumyProduct;
use App\Models\DumyProductPrice;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use DB;

class DownloadProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:download-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download and save product images from external URLs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $products = DumyProduct::where('download','No')->get();
        // foreach ($products as $product) {
        //     if ($product->firebasepath && filter_var($product->firebasepath, FILTER_VALIDATE_URL)) {
        //         try {
        //             $url = $product->firebasepath;
        //             $imageData = file_get_contents($url);
        //             $fileName = $product->id.time().'.jpg';
        //             $filePath = public_path("images/remaining/{$fileName}");
        //             file_put_contents($filePath, $imageData);
        //             $product->thumbnail = "images/product/{$fileName}";
        //             $product->download = "Yes";
        //             $product->save();
        //             $this->info("Downloaded image for product {$product->id}");
        //         } catch (\Exception $e) {
        //             $this->error("Failed to download image for product {$product->id}: {$e->getMessage()}");
        //             $product->downloaded = "No";
        //             $product->save();
        //         }
        //     }
        // }
        DB::transaction(function() {
            $json = File::get(database_path('Products/Life Style.json'));
            foreach (json_decode($json, true) as $row) {
                $dumy = DumyProduct::whereBrandId($row['brand_id'])->whereCategoryId($row['category_id'])->whereSubCategoryId($row['sub_category_id'])->whereName($row['name'])->first();
                if($dumy){
                    $product = Product::create([
                        'brand_id'          => $row['brand_id'],
                        'category_id'       => $row['category_id'],
                        'sub_category_id'   => $row['sub_category_id'],
                        'name'              => $row['name'],
                        'description'       => $row['description'],
                        'thumbnail'         => $dumy->thumbnail,
                        'quantity'          => $row['quantity'],
                        'rating'            => $row['rating'],
                        'in_stock'          => $row['in_stock']
                    ]);
                    $dumy->id = $product->id;
                    $dumy->save();
                    foreach($row['prices'] as $row2){
                        $price = $product->prices()->create([
                            'title'     => $row2['title'],
                            'old_price' => $row2['price'],
                            'new_price' => $row2['price'],
                            'discount'  => 0,
                            'default'   => $row2['default']
                        ]);
                        DumyProductPrice::create([
                            'id'        => $price->id,
                            'product_id'=> $dumy->id,
                            'title'     => $row2['title'],
                            'old_price' => $row2['price'],
                            'new_price' => $row2['price'],
                            'discount'  => 0,
                            'default'   => $row2['default']
                        ]);
                    }
                }
                $this->info("Merged image for product {$dumy->id}");
            }
        });
        $this->info("All products have been merged.");
    }
}
