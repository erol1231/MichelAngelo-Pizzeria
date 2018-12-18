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

Route::group(['middleware' =>'guest'], function()
{
Route::any('/', [
	'uses' => 'LoginController@home',
	'as' => 'home'
]);

Route::post('/loginme', "LoginController@loginme");

Route::view('/login', "login");

Route::view('/register', "register");

Route::post('/registerme', "LoginController@registerme");

});

Route::view('/cart', "user.cart");

Route::get('/logmeout', "LoginController@logmeout"); 

Route::group(['middleware' =>'auth'], function()
{
	  Route::get('/profile', [
      	'uses'=>'LoginController@getProfile',
      	'as'=> 'user.profile'
    ]);
    
    Route::get('productlist/{categ_id}', [
      	'uses'=>'ProductController@getProducts',
      	'as'=> 'productlist'
    ]);

    Route::get('addcart/{id}', 'CartController@addToCart');

    Route::get('/myorder', 'OrderController@myOrders');

    Route::get('/method/{total}' , "OrderController@selectMethod");

    Route::get('/deliver/{total}' , "OrderController@delivery");

    Route::get('/pickup/{total}' , "OrderController@pickup");

    Route::delete('remove-from-cart', 'OrderController@remove');

    Route::patch('update-cart', 'OrderController@update');

    Route::post('/saveorder','OrderController@saveMyOrder');

    Route::post('/saveorder2','OrderController@saveMyOrder2');

    Route::get('/editme','UserController@editUser');

    Route::post('/updateuser','UserController@updateUser');

    Route::get('/changepass','UserController@changePass');

    Route::post('/change_pass','UserController@changeNow');

    Route::get('/showcateg' , "ProductController@showCategory");

    Route::get('/insert_categ' , "ProductController@insertCategory");

    Route::get('/show_order' , "OrderController@showOrders");

    Route::get('/show_orderdetail/{id}' , "OrderController@showOrderDetails");

    Route::get('/delivered/{id}' , "OrderController@deliveredOrder");

    Route::get('/canceled/{id}' , "OrderController@canceledOrder");

    Route::get('/status/{status}', "OrderController@viewStatus");

    Route::get('/allcustomers/{level}', "UserController@getCustomers");

    Route::get('/cust_ord_rec/{id}' , "UserController@getCustomerOrderRec");

    Route::get('/vieworderdet/{id}' , "UserController@viewCustomerOrderRec");

    Route::get('/getallusers/' , "UserController@getAllUsers");

    Route::get('/createadmin', "UserController@createAdmin");

    Route::post('/createadminnow', "UserController@registerAdmin");

    Route::get('/deleteadmin/{id}', "UserController@deleteAdmin");

    Route::get('/showlogs', "OrderController@showLogs");

    Route::get('/showsomeprod/{id}', "ProductController@showProd");

    Route::post('/uploadcategnow', "ProductController@uploadCateg");

    Route::get('/editcateg/{id}',"ProductController@editcateg");

    Route::post('/editcategnow',"ProductController@editcategnow");

    Route::get('/deletecateg/{id}',"ProductController@deletecateg");

    Route::get('/editprod/{id}' , "ProductController@editprod");

    Route::post('/editprodnow' , "ProductController@editprodnow");

    Route::get('/deleteprod/{id}' , "ProductController@deleteprod");

    Route::get('/uploadprods/{id}' , "ProductController@createprod");

    Route::post('/uploadprodsnow' , "ProductController@createprodnow");
});
