<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['namespace' => 'Api'], function () {
//    Route::resource('colleagues', 'ColleagueController');
// });

Route::group(['namespace' => 'Api'], function () {
Route::group(['middleware' => 'auth:api'], function(){
   Route::group(['middleware' => 'admin'], function(){
   Route::resource('profile', 'ProfileController');
   Route::resource('adminprof', 'AdminProfController');
   Route::resource('operatorprof', 'OperatorProfController');
   Route::resource('customerprof', 'CustomerProfController');
   Route::resource('clientprof', 'ClientProfController');
   Route::resource('dataadmin', 'DataadminController');
   });
   Route::group(['middleware' => ['admin' && 'customer']], function(){
   Route::resource('datacustomer', 'DatacustomerController');
   });
   Route::group(['middleware' => ['admin' && 'client']], function(){
   Route::resource('dataclient', 'DataclientController');
   });
   Route::group(['middleware' => ['operator' && 'admin']], function(){
   Route::resource('dataoperator', 'DataoperatorController');
   });
   Route::group(['middleware' => ['customer' && 'operator']], function(){
   Route::resource('datacustomer', 'DatacustomerController');
   });
   Route::group(['middleware' => ['client' && 'operator']], function(){
   Route::resource('dataclient', 'DataclientController');
   });
   Route::group(['middleware' => 'customer'], function(){
   Route::resource('datacustomer', 'DatacustomerController');
   });
   Route::group(['middleware' => 'client'], function(){
   Route::resource('dataclient', 'DataclientController');
   });
});
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('/errors/admin', function () {
    return view('errors.admin');
});

Route::get('/errors/operator', function () {
    return view('errors.operator');
});

Route::get('/errors/customer', function () {
    return view('errors.customer');
});

Route::get('/errors/client', function () {
    return view('errors.client');
});


    // Route::post('details', 'API\UserController@details');
    // Route::post('colleagues', 'API\ColleagueController@index');

Route::get('verify', 'SignupController@verify')->name('signup.verify');