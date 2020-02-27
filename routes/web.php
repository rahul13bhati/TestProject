<?php
Route::group(['middleware' =>['web']], function(){
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

Route::get('/',['as' => 'dashboard', 'uses' => 'SiteController@getIndex', 'middleware' => 'auth']);
Route::get('/logout',['as' => 'logout', 'uses' => 'SiteController@doLogout', 'middleware' => 'auth']);
Route::get('/addUser',['as' => 'addUsers', 'uses' => 'SiteController@addUser', 'middleware' => 'auth']);
Route::get('/Customers',['as' => 'customers', 'uses' => 'SiteController@customers', 'middleware' => 'auth']);
Route::get('/Products',['as' => 'products', 'uses' => 'SiteController@products', 'middleware' => 'auth']);
Route::get('/Orders',['as' => 'orders', 'uses' => 'SiteController@orders', 'middleware' => 'auth']);
Route::get('/Logs',['as' => 'Logs', 'uses' => 'SiteController@logActivity', 'middleware'=>'check-permission:admin']);
Route::post('/signin',['as' => 'signin', 'uses' => 'SiteController@doLogin']);
Route::get('/Login', function () {
    return view('login');
})->name('login');
Route::post('/createUser',['as' => 'createUser', 'uses' => 'SiteController@createUser', 'middleware' => 'auth']);
Route::get('datatable/getdata/orders', ['as'=>'datatable.ordersData','uses'=>'SiteController@OrderData']);
Route::get('datatable/getanydata/{tableName}', ['as'=>'datatable.anyData','uses'=>'SiteController@anyData']);
});
Route::get('/viewOrder/{id}', ['as' => 'viewOrder', 'uses' => 'SiteController@viewOrder']);
Route::get('add-to-log', 'SiteController@myTestAddToLog');
Route::get('logActivity', 'SiteController@logActivity');
Route::get('/addRole',['uses' => 'SiteController@addRole', 'middleware' => 'auth']);
Route::get('/datatable/log_activities',['as' => 'viewLogs', 'uses' => 'SiteController@viewLogs', 'middleware' => 'auth']);