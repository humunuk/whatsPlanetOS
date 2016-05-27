<?php

Route::get('/', 'Controller@getIndex');
Route::get('/data-search', 'Controller@getData');
Route::post('/search', 'Controller@postDetails');
