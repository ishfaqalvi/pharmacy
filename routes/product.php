<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::controller(ProductController::class)->as('products.')->group(function (){
	Route::get('list',					 'index'			 )->name('index'		    	);
	Route::get('create',				 'create'			 )->name('create'	    		);
	Route::post('store',				 'store'			 )->name('store'		    	);
	Route::get('edit/{id}',				 'edit'				 )->name('edit'		    		);
	Route::get('show/{id}',				 'show'				 )->name('show'		    		);
	Route::get('search',				 'search'			 )->name('search'		    	);
	Route::patch('update/{product}',	 'update'			 )->name('update'	    		);
	Route::delete('delete/{id}',		 'destroy'			 )->name('destroy'	    		);
	Route::get('prices/list/{id}',		 'prices'			 )->name('prices.index'			);
	Route::post('prices/store',			 'priceStore'		 )->name('prices.store'			);
	Route::post('prices/update',		 'priceUpdate'		 )->name('prices.update'		);
	Route::delete('prices/delete/{id}',	 'priceDestroy'		 )->name('prices.destroy'		);
	Route::get('images/list/{id}',		 'images'			 )->name('images.index'			);
	Route::post('images/store',			 'imageStore'		 )->name('images.store'			);
	Route::delete('images/delete/{id}',	 'imageDestroy' 	 )->name('images.destroy'		);
	Route::get('special/frequently',	 'specialFrequently' )->name('special.frequently'	);
	Route::get('special/featured',	 	 'specialFeatured'	 )->name('special.featured'		);
	Route::get('special/wellness',	 	 'specialWellness'	 )->name('special.wellness'		);
	Route::get('special/men-and-woman',	 'specialMenAndWoman')->name('special.men&woman'	);
	Route::post('special/store',	 	 'specialStore'		 )->name('special.store'		);
	Route::delete('special/delete/{id}', 'specialDestroy' 	 )->name('special.destroy'	  	);
	Route::post('special/check_product', 'checkProduct'		 )->name('special.checkProduct'	);
	Route::get('sub-categories',    	 'subCategories'	 );
});