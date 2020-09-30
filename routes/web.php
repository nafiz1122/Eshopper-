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

//frondend route
Route::get('/', 'ClientController@index');
Route::get('/product_by_category/{category_id}', 'ClientController@product_by_category');
Route::get('/viewProduct/{id}','ClientController@singleView');

//add_to_cart
Route::post('/add_to_cart','CartController@Add_to_cart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//backend routes


Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/dashboard','AdminController@index');
    //category crud
    Route::get('/addCategory','CategoryController@index');
    Route::post('/addCategory','CategoryController@store');
    Route::get('/allCategory','CategoryController@show');
    Route::get('/deleteCategory/{id}','CategoryController@destroy');
    //Active category
    Route::get('/inactive_category/{id}','CategoryController@inactive_category');
    Route::get('/active_category/{id}','CategoryController@active_category');

    //Brand crud
    Route::get('/addBrand','BrandController@index');
    Route::post('/storeBrand','BrandController@store');
    Route::get('/allBrand','BrandController@show');
    Route::get('/deleteBrand/{id}','BrandController@destroy');
    //Active Brand
    Route::get('/inactive_brand/{id}','BrandController@inactive_brand');
    Route::get('/active_brand/{id}','BrandController@active_brand');

    //product
    Route::get('/addProduct','ProductController@index');
    Route::post('/storeProduct','ProductController@store');
    Route::get('/allProduct','ProductController@show');
    Route::get('/deleteProduct/{id}','ProductController@destroy');

    
    //Active Product
    Route::get('/inactive_product/{id}','ProductController@inactive_product');
    Route::get('/active_product/{id}','ProductController@active_product');




});