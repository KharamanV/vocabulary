<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('hash', 'HashController', ['only' => ['index', 'create', 'store']]);

Route::get('/', function () {
    return redirect()->route('hash.create');
});

Route::get('test', function() {
    
});
