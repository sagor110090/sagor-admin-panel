<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('locale/', function (Request $request){
    Session::put('locale', $request->locale);
    return redirect()->back();
});

Route::view('/', 'frontEnd.index');

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::view('/dashboard', 'dashboard');
    // Route::view('/', 'dashboard');
    Route::get('admin/profile', 'Admin\NavbarController@profile');
    Route::get('admin/layoutSet/{layout}/{sidebar}/{minisidebar}', 'Admin\NavbarController@layoutStting');
    Route::get('admin/restore', 'Admin\NavbarController@restore');
    Route::post('admin/profile/save', 'Admin\NavbarController@profileStore');
    Route::get('admin/activities', 'Admin\ActivityController@activityAll');
    Route::view('admin/settings', 'admin.setting.index');
    Route::get('admin/sendGroupMail', 'EmailController@sendGroupMail');
    Route::post('admin/sendSingleMail', 'Admin\EmailController@sendSingleMail');
    Route::get('admin/email/send', 'Admin\EmailController@send');
    Route::get('admin/emails/mailbox', 'Admin\EmailController@mailbox');
    Route::get('admin/email/{id}', 'Admin\EmailController@showEdit');
    Route::get('admin/emails/delete', 'Admin\EmailController@destroyEmail');
    Route::get('admin/emails/draftbox', 'Admin\EmailController@draftbox');
    Route::get('admin/emails/draft/{id}', 'Admin\EmailController@draft');

});

//-----------------------------------------------------------//||
Route::get('/home', 'HomeController@index')->name('home'); //||
Route::get('/crudIndex', 'HomeController@crudIndex'); //||
Route::get('/crud2index', 'HomeController@crud2index'); //||
Route::post('/jsonSave', 'HomeController@jsonSave'); //||
Route::post('/crudMaker', 'HomeController@crudMaker'); //||
//-----------------------------------------------------------//||

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 

Route::resource('admin/student', 'Admin\\StudentController');