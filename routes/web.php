<?php
Route::get('/clear-cache',function()
{
    $exitcode = Artisan::call('cache:clear');
});

use Illuminate\Support\Facades\Route;
// frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');

//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

// Category product
Route::get('/add-category', 'CategoryProduct@add_category');
Route::get('/all-category', 'CategoryProduct@all_category');
Route::post('/save-category', 'CategoryProduct@save_category');
Route::post('/edit-category/{category_id}', 'CategoryProduct@edit_category');
Route::get('/delete-category/{category_id}', 'CategoryProduct@delete_category');
Route::get('/update-category/{category_id}', 'CategoryProduct@update_category');
Route::get('/edit-category/{category_id}', 'CategoryProduct@edit_category');

Route::get('/unactive-category/{category_id}', 'CategoryProduct@unactive_category');
Route::get('/active-category/{category_id}', 'CategoryProduct@active_category');

// Brand product
Route::get('/add-brand', 'BrandProduct@add_brand');
Route::get('/all-brand', 'BrandProduct@all_brand');
Route::post('/save-brand', 'BrandProduct@save_brand');
Route::post('/edit-brand/{brand_id}', 'BrandProduct@edit_brand');
Route::get('/delete-brand/{brand_id}', 'BrandProduct@delete_brand');
Route::get('/update-brand/{brand_id}', 'BrandProduct@update_brand');
Route::get('/edit-brand/{brand_id}', 'BrandProduct@edit_brand');

Route::get('/unactive-brand/{brand_id}', 'BrandProduct@unactive_brand');
Route::get('/active-brand/{brand_id}', 'BrandProduct@active_brand');

// Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::post('/save-product', 'ProductController@save_product');
Route::post('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/update-product/{product_id}', 'ProductController@update_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');

Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');