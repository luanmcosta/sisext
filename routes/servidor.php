<?php

Route::get('acao', 'ServidorController@listarAcoes');
Route::put('acao/{acao}', 'AcaoController@update')->name('acao.update');
Route::delete('acao/{acao}', 'AcaoController@destroy')->name('acao.destroy');
Route::post('novo', 'AcaoController@store')->name('acao.store');