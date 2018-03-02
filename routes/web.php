<?php

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
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index')->name('index');
Route::post('search',['uses' => 'IndexController@search'])->name('search');
Route::get('/farm/{id}', 'IndexController@farm_show')->name('farm_show')->where('id','[0-9]+');
Route::get('/category/{id}', 'IndexController@product_category')->name('product_category')->where('id','[0-9]+');

//Профіль адміна
Route::group(['prefix'=>'admin', 'middleware' => ['admin','auth']],   function() {
    Route::get('/',['uses' => 'AdminController@index']);
    Route::get('/farm/{id}',['uses' => 'AdminController@farm_show'])->name('admin_farm_show')->where('id','[0-9]+');
    Route::get('/farm/create',['uses' => 'AdminController@farm_create'])->name('admin_farm_create');
    Route::post('/farm/store',['uses' => 'AdminController@farm_store'])->name('admin_farm_store');
    Route::get('/farm/{id}/edit',['uses' => 'AdminController@farm_edit'])->name('admin_farm_edit')->where('id','[0-9]+');
    Route::post('/farm/update',['uses' => 'AdminController@farm_update'])->name('admin_farm_update');
    Route::post('/farm/destroy',['uses' => 'AdminController@farm_destroy'])->name('admin_farm_destroy');

    Route::get('/farm/{id}/product/id/{product_id}',['uses' => 'AdminController@product_show'])->name('admin_product_show')->where(['id'=>'[0-9]+'],['product_id'=>'[0-9]+']);
    Route::get('/farm/{id}/product/create',['uses' => 'AdminController@product_create'])->name('admin_product_create')->where('id','[0-9]+');
    Route::post('/farm/product/store',['uses' => 'AdminController@product_store'])->name('admin_product_store');
    Route::get('/farm/{id}/product/id/{product_id}/edit',['uses' => 'AdminController@product_edit'])->name('admin_product_edit')->where(['id'=>'[0-9]+'],['product_id'=>'[0-9]+']);
    Route::post('/farm/product/update',['uses' => 'AdminController@product_update'])->name('admin_product_update');
    Route::post('/farm/product/destroy',['uses' => 'AdminController@product_destroy'])->name('admin_product_destroy');
    
});

//Профіль фермера
Route::group(['prefix'=>'farmer', 'middleware' => ['auth']],   function() {
    Route::get('/',['uses' => 'FarmerController@index']);
    Route::post('/',['uses' => 'FarmerController@create'])->name('farmer_create');
    Route::get('/farm/{id}',['uses' => 'FarmerController@show'])->name('farm')->where('id','[0-9]+');
    Route::post('/farm/{id}',['uses' => 'FarmerController@product_store'])->name('product_add')->where('id','[0-9]+');
    Route::get('/farm/{id}/edit',['uses' => 'FarmerController@farm_edit'])->name('farm_edit')->where('id','[0-9]+');
    Route::post('/farm_update',['uses' => 'FarmerController@farm_update'])->name('farm_update');
    Route::post('/farm/farm_destroy',['uses' => 'FarmerController@farm_destroy'])->name('farm_destroy');
    Route::get('/farm/{id}/product/{product_id}',['uses' => 'FarmerController@product_edit'])->name('product_edit')->where(['id'=>'[0-9]+'],['product_id'=>'[0-9]+']);
    Route::post('/product_update',['uses' => 'FarmerController@product_update'])->name('product_update');

    Route::post('product_img_slider',['uses' => 'FarmerController@product_img_slider'])->name('product_img_slider');
    Route::get('product_img_slider_delete/{id}',['uses' => 'FarmerController@product_img_slider_delete'])->name('product_img_slider_delete')->where('id','[0-9]+');
});