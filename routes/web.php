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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/deleteuser/{id}', ['as'=>'delete', 'uses' => 'DeleteUserController@index']);
Route::get('/suspenduser/{id}', ['as'=>'suspend', 'uses' => 'SuspendUserController@index']);
Route::get('/unsuspenduser/{id}', ['as'=>'unsuspend', 'uses' => 'SuspendUserController@unsuspend']);

Route::get('/editProfile', ['as'=>'edit', 'uses' => 'EditController@index']);
Route::post('/editProf', ['as'=>'editprof', 'uses' => 'EditController@insert']);
Route::post('/updateProfile', ['as'=>'update', 'uses' => 'EditController@update']);
Route::get('/viewProfile/{id}', ['as'=>'view', 'uses' => 'GroupController@redirectToUser']);

Route::post('/addGroup', ['as'=>'addGroup', 'uses' => 'GroupController@store']);

Route::post('/addToGroup', ['as'=>'addToGroup', 'uses' => 'UserGroupController@addToGroup']);
Route::post('/removeFromGroup', ['as'=>'removeFromGroup', 'uses' => 'UserGroupController@removeFromGroup']);

Route::post('/filterJobs', ['as'=>'filterJobs', 'uses' => 'FilterController@filterJobs']);
Route::post('/filterUsers', ['as'=>'filterUsers', 'uses' => 'FilterController@filterUsers']);

Route::post('/addToJobList', ['as'=>'addToJobList', 'uses' => 'JobListController@addToList']);
Route::post('/removeFromJobList', ['as'=>'removeFromJobList', 'uses' => 'JobListController@removeFromList']);

Route::resource('profiles', 'ProfileController');
Route::resource('groups', 'GroupController');
Route::resource('jobs', 'JobController');
