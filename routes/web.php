<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {
	Route::controller(LoginController::class)->prefix('admin')->group(function () {
	    Route::get('login', 	'showLoginForm'	)->name('admin.showLoginForm');
	    Route::post('login', 	'login'			)->name('admin.login'		 );
	    Route::post('logout', 	'logout'		)->name('admin.logout'		 );
	});
});

/*
|--------------------------------------------------------------------------
| Web Auth Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
	Route::controller(LoginController::class)->group(function () {
	    Route::get('login', 	'showLoginForm'	)->name('web.showLoginForm');
	    Route::post('login', 	'login'			)->name('web.login'  	   );
	    Route::post('logout', 	'logout'		)->name('web.logout'	   );
	});
});

/*
|--------------------------------------------------------------------------
| Web Public Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {
	/*
	|--------------------------------------------------------------------------
	| Home Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/', 'HomeController@index')->name('home');

	/*
	|--------------------------------------------------------------------------
	| Product Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(ProductController::class)->prefix('products')->group(function () {
		Route::get('list',		'index')->name('product.index');
		Route::post('list',		'index')->name('product.filter');
		Route::get('show/{id}',	'show' )->name('product.show');
	});
});

/*
|--------------------------------------------------------------------------
| Web Private Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web','middleware' => ['web','auth']], function () {
	/*
	|--------------------------------------------------------------------------
	| User Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(UserController::class)->prefix('user')->group(function () {
		Route::get('profile',	'profile')->name('user.profile');
		Route::post('update',	'update' )->name('user.update' );
	});

	/*
	|--------------------------------------------------------------------------
	| Cart Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(CartController::class)->prefix('cart')->group(function () {
		Route::get('',				'index'  )->name('cart.index'  );
		Route::post('store',		'store'  )->name('cart.store'  );
		Route::post('update',		'update' )->name('cart.update' );
		Route::post('delete',		'destroy')->name('cart.destroy');
	});

	/*
	|--------------------------------------------------------------------------
	| Checkout Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(OrderController::class)->group(function () {
		Route::get('checkout',   	'checkout')->name('checkout'   );
		Route::post('order/store',	'store'	  )->name('order.store');
		Route::post('order/cancel',	'cancel'  )->name('order.cancel');
		Route::post('order/delete',	'delete'  )->name('order.delete');
	});

	/*
	|--------------------------------------------------------------------------
	| Wishlist Routes
	|--------------------------------------------------------------------------
	*/
	Route::controller(WishlistController::class)->prefix('wishlist')->group(function () {
		Route::get('',				'index'  )->name('wishlist.index'  );
		Route::post('store',		'store'  )->name('wishlist.store'  );
		Route::post('delete',		'destroy')->name('wishlist.destroy');
	});
});