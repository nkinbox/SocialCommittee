<?php
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'Member\ShowMember@profile')->name('profile');
    Route::get('/addmember', 'Member\Addmember@index')->name('addMemberForm');
    Route::post('/addmember', 'Member\Addmember@store')->name('addMember');
});
