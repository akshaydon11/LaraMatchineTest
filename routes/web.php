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

Route::get('/', function () {
	return redirect('login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

Route::get('/products', 'ProductController@index')->name('prod_list');
Route::get('/add_product', 'ProductController@create')->name('addPro');
Route::post('/store_product', 'ProductController@store_prod')->name('storepro');
Route::get('/deletePro/{ProID}', 'ProductController@destroyProd')->name('deletePro');
Route::get('/editPro/{proID}', 'ProductController@editPro')->name('editPro');
Route::post('/update_product/{proID}', 'ProductController@updatePro')->name('updatePro');

Route::get('/categories', 'ProductController@allCategories')->name('allCat');
Route::get('/add_category', 'ProductController@add_category')->name('addCat');
Route::post('/store_cat', 'ProductController@store_cat')->name('storecat');
Route::get('/delete/{CatID}', 'ProductController@destroyCat')->name('deleteCat');
Route::get('/editCat/{CatID}', 'ProductController@editCat')->name('editCat');
Route::post('/updateCat/{CatID}', 'ProductController@updateCat')->name('updateCat');

Route::get('/add_subcategory', 'ProductController@add_subcategory')->name('addSubCat');
Route::post('/store_subcat', 'ProductController@store_subcat')->name('store_subcat');

Route::get('/add_child_cat', 'ProductController@add_child_cat')->name('addchCat');
Route::post('/store_child_cat', 'ProductController@store_child_cat')->name('store_chiscat');


});

Route::get('/logout', function(){
	Auth::logout();
	return redirect('login');
});


