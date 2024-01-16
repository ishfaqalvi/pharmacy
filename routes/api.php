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
Route::namespace('App\Http\Controllers\API')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Auth Route
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthController::class)->group(function () {
        Route::post('auth/login',  'login');
    });
});

Route::middleware('auth:sanctum')->namespace('\App\Http\Controllers\API')->group(function () {
	/*
    |--------------------------------------------------------------------------
    | Auth Route
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthController::class)->prefix('auth')->group(function () {
        Route::get('view',              'view'   );
        Route::post('update',           'update' );
        Route::get('logout',            'logout' );
        Route::delete('delete/{id}',    'destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Brands Route
    |--------------------------------------------------------------------------
    */
    Route::controller(BrandController::class)->prefix('brands')->group(function () {
		Route::get('all',			'all'    );
		Route::get('popular',		'popular');
	});

    /*
    |--------------------------------------------------------------------------
    | Category Route
    |--------------------------------------------------------------------------
    */
	Route::controller(CategoryController::class)->prefix('categories')->group(function () {
		Route::get('main',			'main');
		Route::get('sub',			'sub' );
	});

	/*
    |--------------------------------------------------------------------------
    | Products Route
    |--------------------------------------------------------------------------
    */
    Route::controller(ProductController::class)->prefix('products')->group(function () {
		Route::get('all',			'all'    );
		Route::get('special',		'special');
	});

	/*
    |--------------------------------------------------------------------------
    | Sliders Route
    |--------------------------------------------------------------------------
    */
    Route::controller(SliderController::class)->prefix('sliders')->group(function () {
		Route::get('list',			'index');
	});

	/*
    |--------------------------------------------------------------------------
    | Cart Route
    |--------------------------------------------------------------------------
    */
    Route::controller(CartController::class)->prefix('cart')->group(function () {
		Route::get('list',			     'index'  );
		Route::post('store',		     'store'  );
		Route::patch('update/{item}',    'update' );
        Route::delete('delete/{id}',     'destroy');
	});
});