<?php

use Illuminate\Support\Facades\Route;

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
Route::group(
    ['namespace' => 'Backend', 'middleware' => ['guest']], function () {
    Route::get('/', 'UserController@login')->name('login');
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@authenticate');
    Route::get('/forgot', 'UserController@forgot')->name('forgot');
    Route::post('/forgot', 'UserController@forgot')
        ->name('forgot');
    Route::get('/reset/{token}', 'UserController@reset')
        ->name('reset');
    Route::post('/reset/{token}', 'UserController@reset')
        ->name('reset');
        
 
});

Route::group(
    ['namespace' => 'Backend', 'middleware' => ['auth', 'permission']], function () {
   Route::get('/logout', 'UserController@logout')->name('logout');
    Route::get('/lock', 'UserController@lock')->name('lockscreen');
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');

    //user management
    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')
        ->name('profile');
    Route::post('/profile', 'UserController@profile')
        ->name('profile');
    Route::get('/change-password', 'UserController@changePassword')
        ->name('change_password');
    Route::post('/change-password', 'UserController@changePassword')
        ->name('change_password');
    Route::post('user/status/{id}', 'UserController@changeStatus')
        ->name('user.status');
    Route::any('user/{id}/permission', 'UserController@updatePermission')
        ->name('user.permission');

    //user notification
    Route::get('/notification/unread', 'NotificationController@getUnReadNotification')
        ->name('user.notification_unread');
    Route::get('/notification/read', 'NotificationController@getReadNotification')
        ->name('user.notification_read');
    Route::get('/notification/all', 'NotificationController@getAllNotification')
        ->name('user.notification_all');


    Route::any('/administrator/user/reset-password', 'AdministratorController@userResetPassword')
        ->name('administrator.user_password_reset');



    //user role manage
    Route::get('/role', 'UserController@roles')
        ->name('user.role_index');
    Route::post('/role', 'UserController@roles')
        ->name('user.role_destroy');
    Route::get('/role/create', 'UserController@roleCreate')
        ->name('user.role_create');
    Route::post('/role/store', 'UserController@roleCreate')
        ->name('user.role_store');
    Route::any('/role/update/{id}', 'UserController@roleUpdate')
        ->name('user.role_update');


    // application settings routes
    Route::get('settings/crm', 'SettingsController@crmSettings')
        ->name('settings.crm');
    Route::post('settings/crm', 'SettingsController@crmSettings')
        ->name('settings.crm');
		
	//Industry manage
	Route::get('/industry', 'MasterController@industryindex')
		->name('industry.index');
	Route::get('/industry/create', 'MasterController@industrycreate')
		->name('industry.create');
	Route::post('/industry/store', 'MasterController@industrycreate')
		->name('industry.store');
	Route::any('/industry/update/{id}', 'MasterController@industryupdate')
		->name('industry.update');
	 Route::get('/industry/delete/{id}', 'MasterController@industrydestroy')
		->name('industry.destroy');
		
			//Sub Industry manage
	Route::get('/subindustry', 'MasterController@subindustryindex')
		->name('subindustry.index');
	Route::get('/subindustry/create', 'MasterController@subindustrycreate')
		->name('subindustry.create');
	Route::post('/subindustry/store', 'MasterController@subindustrycreate')
		->name('subindustry.store');
	Route::any('/subindustry/update/{id}', 'MasterController@subindustryupdate')
		->name('subindustry.update');
	 Route::get('/subindustry/delete/{id}', 'MasterController@subindustrydestroy')
		->name('subindustry.destroy');
		
			//Income Group manage
	Route::get('/incomegroup', 'MasterController@incomegroupindex')
		->name('incomegroup.index');
	Route::get('/incomegroup/create', 'MasterController@incomegroupcreate')
		->name('incomegroup.create');
	Route::post('/incomegroup/store', 'MasterController@incomegroupcreate')
		->name('incomegroup.store');
	Route::any('/incomegroup/update/{id}', 'MasterController@incomegroupupdate')
		->name('incomegroup.update');
	Route::get('/incomegroup/delete/{id}', 'MasterController@incomegroupdestroy')
		->name('incomegroup.destroy');
		
		//Crm Data
	Route::get('/crmdata/import/list', 'CrmdataController@crmdataimportlist')
		->name('dataimport.index');
	Route::get('/crmdata/import', 'CrmdataController@crmdataimport')
		->name('dataimport.create');
	Route::post('/crmdata/import', 'CrmdataController@crmdataimportstore')
		->name('dataimport.store');
	Route::get('/crmdata/import/delete/{id}', 'CrmdataController@crmdataimportdelete')
		->name('dataimport.destroy');
		
	Route::get('/crmdata/list', 'CrmdataController@crmdatalist')
		->name('CrmData.list');
	Route::get('/crmdata/create', 'CrmdataController@create')
		->name('CrmData.create');
	Route::post('/crmdata/store', 'CrmdataController@store')
		->name('CrmData.store');
	Route::get('/crmdata/edit/{id}', 'CrmdataController@edit')
		->name('CrmData.edit');
	Route::post('/crmdata/update/{id}', 'CrmdataController@update')
		->name('CrmData.update');
	Route::get('/crmdata/delete/{id}', 'CrmdataController@destroy')
		->name('CrmData.destroy');
	Route::get('/crmdata/view/{id}', 'CrmdataController@view')
		->name('CrmData.view');
	Route::post('/crmdata/assign', 'CrmdataController@assign')
		->name('CrmData.assign');
    Route::post('/crmdata/assignrequest', 'CrmdataController@assignrequest')
		->name('CrmData.assignrequest');
	Route::post('/crmdata/assignrequestlist', 'CrmdataController@assignrequestlist')
		->name('CrmData.assignrequestlist');
	Route::post('/crmdata/download', 'CrmdataController@download')
		->name('CrmData.download');



   
   



});



