<?php

Route::get('/', 'ServidorController@index');
Route::get('acao', 'ServidorController@listarAcoes');
Route::put('acao/{acao}', 'ServidorController@atualizarAcao')->name('acao.update');
Route::delete('acao/{acao}', 'ServidorController@deletarAcao')->name('acao.destroy');
Route::post('novo', 'ServidorController@adicionarAcao')->name('acao.store');