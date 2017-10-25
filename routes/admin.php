<?php



Route::get('/home', function () {
    return view('admin.home');
})->name('home');

Route::get('acao', 'AcaoController@index')->name('acao.index');
Route::put('acao/{acao}', 'AcaoController@update')->name('acao.update');
Route::delete('acao/{acao}', 'AcaoController@destroy')->name('acao.destroy');
Route::post('novo', 'AcaoController@store')->name('acao.store');
