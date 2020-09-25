<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'StanzeController@index') -> name('stanze-index');

Route::get('/show/{id}', 'StanzeController@show') -> name('stanza-show');
