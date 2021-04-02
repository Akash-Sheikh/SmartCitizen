<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Provider;
use App\Seeker;



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

//Welcome Page
Route::get('/', function () {

    if(Session::get('admin_value')){
        return view('admin/home');
    }

    if(Session::get('provider_value')){
            return view('provider/home');
    }   
          
    if(Session::get('seeker_value')){
        return view('home');
    } 

    return view('welcome');
});

Auth::routes();

//Login Routes
Route::get('/login', 'LoginController@getLog')->name('login');
//Route::get('/register', 'LoginController@getRegister')->name('register');
//Route::get('/forget', 'LoginController@forgetUser')->name('get.forget');
Route::post('user-login', [
    'uses' => 'LoginController@login',
    'as' => 'user.login'
]);


//Vendor
Route::get('/provider-register', 'ProviderController@providerRegistration')->name('provider.register');



////Admin
//Shop Categories
Route::get('/admin-shop', 'AdminController@shopCategoriesGet')->name('admin.shopCategoriesGet');
Route::post('/admin-shop', 'AdminController@addShopCategories')->name('admin.addShopCategories');
Route::get('/admin-shop-update{id}', 'AdminController@updateShopCategoriesGet')->name('admin.updateShopCategoriesGet');
Route::post('/admin-shop-update', 'AdminController@updateShopCategoriesPost')->name('admin.updateShopCategoriesPost');
Route::get('/admin-shop-delate{id}', 'AdminController@delateShopCategories')->name('admin.delateShopCategories');
//Shops
Route::get('/admin-shops', 'AdminController@shopsGet')->name('admin.shopsGet');
Route::post('/admin-shops', 'AdminController@addShops')->name('admin.addShops');
Route::get('/admin-shops-update{id}', 'AdminController@updateShopsGet')->name('admin.updateShopsGet');
Route::post('/admin-shops-update', 'AdminController@updateShopsPost')->name('admin.updateShopsPost');
Route::get('/admin-shops-delate{id}', 'AdminController@delateShops')->name('admin.delateShops');

//Product Categories
Route::get('/admin-product', 'AdminController@productCategoriesGet')->name('admin.productCategoriesGet');
Route::post('/admin-product', 'AdminController@addProductCategories')->name('admin.addProductCategories');
Route::get('/admin-product-update{id}', 'AdminController@updateProductCategoriesGet')->name('admin.updateProductCategoriesGet');
Route::post('/admin-product-update', 'AdminController@updateProductCategoriesPost')->name('admin.updateProductCategoriesPost');
Route::get('/admin-product-delate{id}', 'AdminController@delateProductCategories')->name('admin.delateProductCategories');
//Products
Route::get('/admin-products', 'AdminController@productsGet')->name('admin.productsGet');
Route::post('/admin-products', 'AdminController@addProducts')->name('admin.addProducts');
Route::get('/admin-products-update{id}', 'AdminController@updateProductsGet')->name('admin.updateProductsGet'); 
Route::post('/admin-products-update', 'AdminController@updateProductsPost')->name('admin.updateProductsPost');
Route::get('/admin-products-delate{id}', 'AdminController@delateProducts')->name('admin.delateProducts');




//Home Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'HomeController@admin_index')->name('admin.home');
    Route::get('/provider', 'HomeController@provider_index')->name('provider.home');
});



 //Customer
Route::get('/about', 'CustomerController@aboutGet')->name('customer.aboutGet');
Route::get('/contact', 'CustomerController@contactGet')->name('customer.contactGet');

//Restaurants
Route::get('/restaurants', 'CustomerController@restaurantsGet')->name('customer.restaurantsGet');
//Shops
Route::get('/shops', 'CustomerController@shopsGet')->name('customer.shopsGet');
//Services
Route::get('/services', 'CustomerController@servicesGet')->name('customer.servicesGet');





