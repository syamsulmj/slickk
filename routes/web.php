<?php

Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@loginPage');
Route::post('/login-check', 'HomeController@login');
Route::get('/register', 'HomeController@register');
Route::post('/register-check', 'HomeController@create');
Route::post('/logout', 'HomeController@logout');
Route::get('/list-device', 'ListedDevicesController@index');
Route::post('/list-device-add', 'ListedDevicesController@create');
Route::get('/update-status/{email}/{device_name}', 'ListedDevicesController@update_status');
Route::get('get-port/{email}/{instruction}', 'DataController@get_port');
Route::get('mobile-update/{email}/secret', 'DataController@mobile_update');
Route::get('/edit-device', 'ListedDevicesController@edit_device');
Route::delete('/delete-device/{email}/{device_title}', 'ListedDevicesController@delete_device');
Route::post('/edit-device', 'ListedDevicesController@update_device');
Route::get('/profile', 'HomeController@show_profile');
