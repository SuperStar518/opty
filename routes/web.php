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

Route::get('/','Front\HomeController@index')->name('front.home');

Auth::routes();

// NOTE:
// remove the demo middleware before you start on a project, this middleware if only
// for demo purpose to prevent viewers to modify data on a live demo site

// admin
Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function()
{
    // single page
    Route::get('/', 'SinglePageController@displaySPA')->name('admin.spa');

    // resource routes
    Route::resource('users','UserController');
});

// user
Route::prefix('user')->namespace('User')->middleware(['auth'])->group(function()
{
    // single page
    Route::get('/', 'SinglePageController@displaySPA')->name('user.spa');

    // resource routes
    Route::resource('users','UserController');
});