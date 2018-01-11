<?php

use Illuminate\Http\Request;
Route::group(['middleware'=>'auth:api'], function(){
    Route::get('logout','API\Auth\LoginController@logout');
    Route::get('/profile', 'API\Member\ShowMember@profile')->name('profile');
    Route::get('/member_profile', 'API\Member\ShowMember@show')->name('memberProfile');
    Route::get('/member_list', 'API\Member\AllMembers@show')->name('AllMemberList');
    Route::get('/lobby_members', 'API\Member\LobbyMember@show')->name('LobbyMemberList');
    Route::post('/addmember', 'API\Member\Addmember@store')->name('addMember');
    Route::get('/pending', 'API\Member\EditMember@pendingApplications')->name('pendingApproval');
    Route::get('/member', 'API\Member\EditMember@show')->name('showMember');
    Route::get('/member/edit', 'API\Member\EditMember@edit')->name('editMemberForm');
    Route::post('/member', 'API\Member\EditMember@update')->name('editMember');
    Route::put('/member', 'API\Member\EditMember@position_allot')->name('positionAllot');
    //Route::delete('/member/{id}', 'API\Member\EditMember@destroy')->name('destroyMember');
    Route::post('/nominee', 'API\Member\Nominee@store')->name('addNominee');
    Route::get('/nominee/edit', 'API\Member\Nominee@edit')->name('editNomineeForm');
    Route::put('/nominee', 'API\Member\Nominee@update')->name('editNominee');
    Route::delete('/nominee', 'API\Member\Nominee@destroy')->name('deleteNominee');
});
Route::post('login','API\Auth\LoginController@login');
Route::post('register','API\Auth\RegisterController@register');

