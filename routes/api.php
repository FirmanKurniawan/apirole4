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
   Route::resource('dataadmin', 'DataadminController');
   });
   Route::group(['middleware' => 'admin' && 'customer'], function(){
   Route::resource('datacustomer', 'DatacustomerController');
   });
   Route::group(['middleware' => 'admin' && 'client'], function(){
   Route::resource('dataclient', 'DataclientController');
   });
   Route::group(['middleware' => 'operator' && 'admin'], function(){
   Route::resource('dataoperator', 'DataoperatorController');
   });
   Route::group(['middleware' => 'customer' && 'operator'], function(){
   Route::resource('datacustomer', 'DatacustomerController');
   });
   Route::group(['middleware' => 'client' && 'operator'], function(){
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

    // Route::post('details', 'API\UserController@details');
    // Route::post('colleagues', 'API\ColleagueController@index');

	Route::group(['middleware' => 'auth:api'], function(){
		Route::group(['middleware' => 'admin'], function(){
			Route::group(['prefix' => 'admin'] , function(){
			Route::post('details', 'API\UserController@details');
			});
		});
	});

	Route::group(['middleware' => 'auth:api'], function(){
		Route::group(['middleware' => 'operator'], function(){
			Route::group(['prefix' => 'operator'] , function(){
			Route::get('/','OperatorController@index');
			Route::post('colleagues', 'API\ColleagueController@index');
			});
		});
	});

	Route::group(['middleware' => 'auth:api'], function(){
		Route::group(['middleware' => 'customer' && 'operator'], function(){
			Route::group(['prefix' => 'customer'] , function(){
			Route::post('customer', 'API\ColleagueController@customer');
			});
		});
	});

	Route::group(['middleware' => 'auth:api'], function(){
		Route::group(['middleware' => 'client' && 'operator'], function(){
			Route::group(['prefix' => 'client'] , function(){
			Route::get('/','OperatorController@index');
			Route::post('client', 'API\ColleagueController@client');
			});
		});
	});

Route::get('verify', 'SignupController@verify')->name('signup.verify');