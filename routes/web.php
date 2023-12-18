<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\DynamicPageController;
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
| Auth Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| Public Pages Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Web'], function () {

	Route::get('/', 'HomeController@index')->name('home');

	Route::controller(ProductController::class)->prefix('products')->group(function () {
		Route::get('list',		'index')->name('product.index');
		Route::post('list',		'index')->name('product.filter');
		Route::get('show/{id}',	'show' )->name('product.show');
	});
	Route::controller(UserController::class)->prefix('users')->group(function () {
		Route::get('profile',		'profile')->name('user.profile');
	});
});