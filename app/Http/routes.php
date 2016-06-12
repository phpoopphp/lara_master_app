<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'web'],function(){
    Route::auth();
    Route::get('/home', 'HomeController@index');

    Route::get('/example',function(){
//       $user=\App\User::with('roles')->get();
//       return $user;

        $roles=\App\Role::with('user')->get();

        return $roles;
    });


    /*Admin Routes*/
    Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'admin'],function (){

        Route::resource('/users','AdminUsersController');

    });
});

