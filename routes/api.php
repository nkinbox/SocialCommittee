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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('logout','API\Auth\LoginController@logout');
    //Route::resource('member', 'MemberController');
});
Route::post('login','API\Auth\LoginController@login');
Route::post('register','API\Auth\RegisterController@register');

