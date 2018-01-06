<?php
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'Member\ShowMember@profile')->name('profile');
    Route::get('/addmember', 'Member\Addmember@index')->name('addMemberForm');
    Route::post('/addmember', 'Member\Addmember@store')->name('addMember');
    Route::get('/pending', 'Member\EditMember@pendingApplications')->name('pendingApproval');
    Route::get('/member/{id}', 'Member\EditMember@show')->name('showMember');
    Route::post('/member/{id}', 'Member\EditMember@edit')->name('editMember');
    Route::delete('/member/{id}', 'Member\EditMember@destroy')->name('destroyMember');
});
