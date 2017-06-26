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

Route::get('newsletter',[
    'uses'=>'NewsLetterController@create',
    'as'=>'newsletter'
]);

Route::post('apply',[
    'uses'=>'NewsLetterController@store',
    'as'=>'apply'
]);

Route::post('apply-two',[
    'uses'=>'NewsLetterController@autoMail',
    'as'=>'apply-two'
]);
