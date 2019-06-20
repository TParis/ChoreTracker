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


//DailyChoresController

Route::get('/', 'DailyChoresController@show');
Route::get('/admin', 'DailyChoresController@admin');

//KidsController

Route::get('/admin/kid/edit/{kid}', [
  'as'  =>  'editKid',
  'uses'  =>  'KidsController@edit'
]);
Route::put('/admin/kid/edit/{kid}', [
  'as'  =>  'updateKid',
  'uses'  =>  'KidsController@update'
]);
Route::get('/admin/kid/add', [
  'as'  =>  'addKid',
  'uses'  =>  'KidsController@add'
]);
Route::post('/admin/kid/add', [
  'as'  =>  'submitKid',
  'uses'  =>  'KidsController@create'
]);
Route::get('/admin/points', [
  'as'  =>  'givePoints',
  'uses'  =>  'KidsController@givePoints'
]);
Route::put('/admin/points', [
  'as'  =>  'grantPoints',
  'uses'  =>  'KidsController@grantPoints'
]);


// ChoresController

Route::get('/admin/chore/edit/{chore}', [
  'as'  =>  'editChore',
  'uses'  =>  'ChoresController@edit'
]);
Route::put('/admin/chore/edit/{chore}', [
  'as'  =>  'updateChore',
  'uses'  =>  'ChoresController@update'
]);
Route::get('/admin/chore/add', [
  'as'  =>  'addChore',
  'uses'  =>  'ChoresController@add'
]);
Route::post('/admin/chore/add', [
  'as'  =>  'submitChore',
  'uses'  =>  'ChoresController@create'
]);
Route::post('/complete/{chore}', [
  'as'  =>  'complete',
  'uses'  =>  'DailyChoresController@complete'
]);
Route::get('/chores/load', [
  'as'  =>  'load',
  'uses'  =>  'DailyChoresController@loadDailyChores'
]);
Route::get('/chores/clear', [
  'as'  =>  'clear',
  'uses'  =>  'DailyChoresController@clearDailyChores'
]);

// AwardsController

Route::get('/redeem/{kid}', [
  'as'  =>  'redeem',
  'uses'  =>  'AwardsController@redeem'
]);
Route::get('/pick/{kid}/{award}', [
  'as'  =>  'pickAward',
  'uses'  =>  'AwardsController@pick'
]);
Route::post('/grant/{kid}/{award}', [
  'as'  =>  'grantAward',
  'uses'  =>  'AwardsController@grant'
]);
Route::get('/admin/award/edit/{award}', [
  'as'  =>  'editAward',
  'uses'  =>  'AwardsController@edit'
]);
Route::put('/admin/award/edit/{award}', [
  'as'  =>  'updateAward',
  'uses'  =>  'AwardsController@update'
]);
Route::get('/admin/award/add', [
  'as'  =>  'addAward',
  'uses'  =>  'AwardsController@add'
]);
Route::post('/admin/award/add', [
  'as'  =>  'submitAward',
  'uses'  =>  'AwardsController@create'
]);
Route::get('/admin/award/del/{award}', [
  'as'  =>  'deleteAward',
  'uses'  =>  'AwardsController@delete'
]);

#Undo chore
Route::get('/admin/chore/undo', [
  'as'  =>  'undoChore',
  'uses'  =>  'DailyChoresController@listDates'
]);
Route::get('/admin/chore/undo/{date}', [
  'as'  =>  'undoChore',
  'uses'  =>  'DailyChoresController@listChoresByDate'
]);
Route::delete('/admin/chore/undo/{chore}', [
  'as'  =>  'undoChore',
  'uses'  =>  'DailyChoresController@undo'
]);
