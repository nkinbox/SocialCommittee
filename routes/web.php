<?php
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/profile', 'Member\ShowMember@profile')->name('profile');
    Route::get('/member_profile/{id}', 'Member\ShowMember@show')->name('memberProfile');

    Route::get('/member_list', 'Member\AllMembers@show')->name('AllMemberList');
    Route::get('/lobby_members', 'Member\LobbyMember@show')->name('LobbyMemberList');

    Route::get('/addmember', 'Member\Addmember@index')->name('addMemberForm');
    Route::post('/addmember', 'Member\Addmember@store')->name('addMember');

    Route::get('/pending', 'Member\EditMember@pendingApplications')->name('pendingApproval');
    Route::get('/member/{id}', 'Member\EditMember@show')->name('showMember');
    Route::get('/member/edit/{id}', 'Member\EditMember@edit')->name('editMemberForm');
    Route::post('/member/{id}', 'Member\EditMember@update')->name('editMember');
    Route::put('/member/{id}', 'Member\EditMember@position_allot')->name('positionAllot');
    Route::delete('/member/{id}', 'Member\EditMember@destroy')->name('destroyMember');

    Route::get('/nominee/{member_id}', 'Member\Nominee@index')->name('addNomineeForm');
    Route::post('/nominee', 'Member\Nominee@store')->name('addNominee');
    Route::get('/nominee/edit/{nominee_id}', 'Member\Nominee@edit')->name('editNomineeForm');
    Route::put('/nominee/{nominee_id}', 'Member\Nominee@update')->name('editNominee');
    Route::delete('/nominee', 'Member\Nominee@destroy')->name('deleteNominee');
});
