<?php

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

//SandBox Section
Route::get('/sandbox/send/sms', function () {
    return view('sandbox.sms');
})->name("send_sms_sandbox");
Route::post('/sandbox/process/sms','SandBox\SmsController@processMessage')->name('process_sms_sandbox');



//Customers Web Route File

Route::get('/login', function () {
    return view('auth.customer.login');
})->name("login");

Route::get('/reset/account', function () {
    return view('auth.customer.reset_password');
})->name("reset_account");

//Home page
Route::get('/','HomeController@index')->name('home');
Route::get('/home','HomeeController@index')->name('home');


Route::post('/login','Auth\AuthController@login')->name('process_login');
Route::get('/logout','Auth\AuthController@logout')->name('logout');

Route::post('/reset/account','Auth\AuthController@reset_account')->name('reset_account');
Route::get('/reset/password/setup','Auth\AuthController@reset_account')->name('password_setup');
Route::get('/reset/password/setup/{code}','Auth\AuthController@start_account_password');

Route::post('/set/password','Auth\AuthController@set_account_password')->name('set_password');



Route::group(array('middleware' => 'auth'), function(){

    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    //Route::get('/','DashboardController@index')->name('dashboard');

    //Bank Account Management
    Route::get('/accounts','BankAccountController@index')->name('accounts');
    Route::post('/account','BankAccountController@store')->name('account');
    Route::post('/account/update/{id}','BankAccountController@update')->name('update_account');
    Route::get('/account/delete/{id}','BankAccountController@destory')->name('delete_account');
    Route::get('/account/restore/{id}','BankAccountController@restore')->name('restore_account');
    
    Route::get('/account/transactions/{id}','BankAccountController@transactions')->name('account_history');
    Route::get('/transactions','BankAccountController@all_transactions')->name('all_transactions');
    Route::post('/bank/transaction','BankAccountController@storeTransaction')->name('add_bank_transaction');
    
    
    //Cards Management
    Route::get('/cards','CardController@index')->name('cards');
    Route::post('/card','CardController@store')->name('card');
    Route::get('/card/transactions/{id}','CardTransactionController@show')->name('card_transactions');
    Route::post('/card/update/{id}','CardController@update')->name('update_card');
    Route::get('/card/delete/{id}','CardController@destory')->name('delete_card');
    Route::get('/card/restore/{id}','CardController@restore')->name('restore_card');
    Route::post('/card/ransaction','CardTransactionController@storeTransaction')->name('add_card_transaction');
    
    //Profile Management
    Route::get('/profile','ProfileController@index')->name('profile');

    //Setting Management
    Route::get('/settings','SettingsController@index')->name('settings');
    Route::post('/settings','SettingsController@update')->name('update_settings');
    

    //Inbox Messages
    Route::get('/inbox','MessageController@index')->name('inbox');
    Route::get('/inbox/{id}','MessageController@show')->name('read_message');
    Route::post('/send/message','MessageController@store')->name('send_message');


    //User Account Management
    Route::get('/users','UserController@index')->name('users');
    Route::get('/user/delete/{id}','UserController@destory')->name('delete_user');
    Route::get('/user/restore/{id}','UserController@restore')->name('restore_user');
    Route::post('/user/save','UserController@store')->name('save_user');
    Route::post('/user/update/{id}','UserController@update')->name('edit_user');
    Route::post('/user/password/update/{id}','UserController@change_password')->name('change_password');
    

    //Currencies
    Route::get('/currencies','CurrencyController@index')->name('currencies');
    Route::post('/currency/save','CurrencyController@store')->name('save_currency');
    Route::post('/currency/update/{id}','CurrencyController@update')->name('edit_currency');

    //Card Types
    Route::get('/card/types','CardTypeController@index')->name('card_types');
    Route::post('/card/types/save','CardTypeController@store')->name('save_card_type');
    Route::post('/card/types/update/{id}','CardTypeController@update')->name('edit_card_type');


    //Banks
    Route::get('/banks','BankController@index')->name('banks');
    Route::post('/bank/save','BankController@store')->name('save_bank');
    Route::post('/bank/update/{id}','BankController@update')->name('edit_bank');
    Route::get('/bank/delete/{id}','BankController@destory')->name('delete_bank');
    Route::get('/bank/restore/{id}','BankController@restore')->name('restore_bank');
    

    //Bank Locations
    Route::get('/bank/{id}/locations','BankLocationController@index')->name('bank_locations');
    Route::post('/bank/location/save','BankLocationController@store')->name('save_bank_location');
    Route::post('/bank/location/update/{id}','BankLocationController@update')->name('edit_bank_location');
    Route::get('/bank/location/delete/{id}','BankLocationController@destory')->name('delete_bank_location');
    Route::get('/bank/location/restore/{id}','BankLocationController@restore')->name('restore_bank_location'); 

});
