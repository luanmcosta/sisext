<?php

Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('acao', 'AcaoController@index');