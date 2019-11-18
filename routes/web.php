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

Route::resource('sliders', 'SliderController');
Route::resource('services', 'ServiceController');
Route::resource('events', 'EventController');
Route::resource('testimonials', 'TestimonialController');
Route::resource('cuisines', 'CuisineController');