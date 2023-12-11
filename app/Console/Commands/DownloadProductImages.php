<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
        // where('id', '>', 6500)->
        $products = Product::where('downloaded','No')->get();
        foreach ($products as $product) {
            if ($product->thumbnail && filter_var($product->thumbnail, FILTER_VALIDATE_URL)) {
                try {
                    $url = $product->thumbnail;
                    $imageData = file_get_contents($url);
                    $fileName = $product->id.time().'.jpg';
                    $filePath = public_path("images/product/{$fileName}");
                    file_put_contents($filePath, $imageData);
                    $product->thumbnail_path = "images/product/{$fileName}";
                    $product->downloaded = "Yes";
                    $product->save();
                    $this->info("Downloaded image for product {$product->id}");
                } catch (\Exception $e) {
                    $this->error("Failed to download image for product {$product->id}: {$e->getMessage()}");
                    $product->downloaded = "No";
                    $product->save();
                }
            }
        }
        $this->info('All images have been downloaded.');
    }
}
