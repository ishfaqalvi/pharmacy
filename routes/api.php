<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SubCategoryController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(BrandController::class)->prefix('brands')->group(function () {
	Route::get('list',			'index');
});

Route::controller(CategoryController::class)->prefix('categories')->group(function () {
	Route::get('list',			'index'  );
});

Route::controller(SubCategoryController::class)->prefix('sub-categories')->group(function () {
	Route::get('list',			'index'  );
});

Route::controller(ProductController::class)->prefix('products')->group(function () {
	Route::get('list',			'index'  );
	Route::post('create',		'store'  );
	Route::delete('delete/{id}','destroy');
});