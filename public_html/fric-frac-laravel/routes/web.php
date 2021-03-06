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


Route::get('/', function () {
    return view('admin.index');
});


//Route::resource('eventcategory','EventCategoryController');
Route::resource('eventcategory','App\Http\Controllers\EventCategoryController');
Route::resource('eventtopic','App\Http\Controllers\EventTopicController');
Route::resource('event','App\Http\Controllers\EventController');
