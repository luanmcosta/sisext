<?php


Route::get('acao', 'AdminController@listarAcoes')->name('acao.index');
Route::put('acao/{acao}', 'AdminController@atualizarAcao')->name('acao.update');
Route::delete('acao/{acao}', 'AdminController@deletarAcao')->name('acao.destroy');
Route::post('novo', 'AdminController@salvarAcao')->name('acao.store');

Route::get('/home', 'AdminController@index')->name('index');

Route::get('/edit/{id}','AdminController@edit');
	
Route::post('/update/{id}','AdminController@update');

Route::prefix('servidor')->group(function () {
	Route::get('/', 'AdminController@listarServidores')->name('servidor.index');

	Route::get('/create', 'ServidorController@create');

	Route::get('/show','ServidorController@show');

	Route::post('/store','ServidorController@store');
	
	Route::get('/edit/{id}','ServidorController@edit');
	
	Route::post('/update/{id}','ServidorController@update');
	
	Route::delete('/destroy/{id}','ServidorController@destroy');
});

Route::post('/admin/sair', 'ServidorController@sair');