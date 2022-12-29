<?php

use Illuminate\Support\Facades\Route;

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

//PHP auth
Route::get('/php_login', function () {
    return view('php_authorization.login');    
});
//Public Route
Route::resource('/posts', PostController::class);
//----- generate/fake/posts?total=50 ------//
Route::get('generate/fake/posts', [\App\Http\Controllers\PostController::class,'fakePosts']); 

Route::get('/', function () {
    return view('welcome');    
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group( 
//     ['middleware' => ['loginCustomer']], //Customer can't login in backend
//     function ()
//     {
//         Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     }
// );



// All backend routes

Route::group(
            
    ['middleware' => ['loginCustomer']], //Customer can't login in backend

    function ()
    {
    
        Route::prefix('admin')->group(function () {
        
            Route::resource('/users', UserController::class);
    
            // Start Products routes
                Route::resource('/products', ProductController::class);
                
                Route::get('product/{id}/features', 'ProductController@product_features');
                Route::get('product/{id}/edit_features', 'ProductController@edit_features');
                Route::post('product_features', 'ProductController@store_features');
                Route::post('products/delete_selected_rows', 'ProductController@delete_selected_rows');
                Route::get('/search_product', 'ProductController@index');
                Route::get('/advance_search_product', 'ProductController@index');
            // End Products routes
    
            // Start Brands routes
                Route::resource('/brands', BrandController::class);
                // Route::get('/search_brand', 'BrandController@index');
                Route::GET('/brands_live_search', 'BrandController@brand_table_data');
            // End Brands routes
    
            // Start Types routes
                Route::resource('/types', TypeController::class);
                // Route::get('/search_type', 'TypeController@index');
                Route::GET('/types_live_search', 'TypeController@type_table_data');
            // End Types routes
                
            
            Route::get('/history', 'HistoryController@index');
            Route::get('/history/parts/clearHistory', 'HistoryController@clearPartsHistory');
            Route::get('/history/products/clearHistory', 'HistoryController@clearProductHistory');
            
        Route::get('/history/partsHistory', 'HistoryController@partsHistory');
            Route::get('/history/productsHistory', 'HistoryController@productsHistory');
            
            //Start E-Store
                Route::resource('/accessory_brands', AccessoryBrandController::class);
                Route::GET('/accessory_brands_live_search', 'AccessoryBrandController@accessory_brand_table_data');

                Route::resource('/accessory_categories', AccessoryTypeController::class);
                Route::GET('/accessory_types_live_search', 'AccessoryTypeController@accessory_type_table_data');

                Route::resource('/accessories', AccessoryController::class);
                Route::post('accessories/delete_selected_rows', 'AccessoryController@delete_selected_rows');
                Route::get('/search_accessory', 'AccessoryController@index');
                Route::get('/advance_search_accessory', 'AccessoryController@index');
            //End E-Store
        });
    
    }
);
    
    
    Route::prefix('front/')->group(function () {
        // Public routes
        
        //-Pages-
            Route::get('home', 'FrontPagesController@home');
            Route::get('products', 'FrontPagesController@listPage');
            Route::get('product/{product_id}/details', 'FrontPagesController@productDetails');
            Route::get('accessory/{accessory_id}/details', 'FrontPagesController@accessoryDetails');
            
            //Store
            Route::get('parts', 'FrontPagesController@partslistPage');
            Route::get('accessory/purchased_process/{id}', 'FrontPagesController@purchase_part');
            Route::get('product/purchased_process/{id}', 'FrontPagesController@purchase_product');
            Route::POST('store_part_buyer_details', 'FrontPagesController@part_buyer_details');
            Route::POST('store_product_buyer_details', 'FrontPagesController@product_buyer_details');

            Route::get('/advance_search_product', 'FrontPagesController@listPage');

            Route::get('used_cars', 'FrontPagesController@usedCars');
            Route::get('sellProduct', 'FrontPagesController@sell_product');
            Route::post('store_sell_product', 'FrontPagesController@store_sellproduct');
            Route::get('seller_personal_information/{product_id}', 'FrontPagesController@seller_detailForm');
            Route::post('store_owner_details', 'FrontPagesController@store_ownerDetails');
        //-Pages-//

        Route::get('login', 'FrontPagesController@getLogin');
        Route::post('checkLogin', 'FrontPagesController@checkLogin');
        Route::get('type', 'FrontPagesController@Register');
        Route::post('save_register', 'FrontPagesController@postRegister');
        Route::get('logout', 'FrontPagesController@frontLogout');

        Route::get('resetPassword', 'FrontPagesController@resetPassword');

        // group middleware -->Only Admin can login in backend

        


    });
// All backend routes
