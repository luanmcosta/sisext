<?php


Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('acao', 'AcaoController@index')->name('acao.index');
Route::put('acao/{acao}', 'AcaoController@update')->name('acao.update');
Route::delete('acao/{acao}', 'AcaoController@destroy')->name('acao.destroy');
Route::post('novo', 'AcaoController@store')->name('acao.store');


Route::get('/', 'AdminController@index')->name('index');

Route::get('/edit/{id}','AdminController@edit');
	
Route::post('/update/{id}','AdminController@update');

Route::prefix('servidor')->group(function () {
	Route::get('/', 'ServidorController@index')->name('servidor.index');

	Route::get('/create', 'ServidorController@create');

	Route::get('/show','ServidorController@show');

	Route::post('/store','ServidorController@store');
	
	Route::get('/edit/{id}','ServidorController@edit');
	
	Route::post('/update/{id}','ServidorController@update');
	
	Route::delete('/destroy/{id}','ServidorController@destroy');
});