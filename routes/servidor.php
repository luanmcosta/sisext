<?php

Route::get('/home', function () {
    // $users[] = Auth::user();
    // $users[] = Auth::guard()->user();
    // $users[] = Auth::guard('servidor')->user();

    //dd($users);

    return view('servidor.home');
})->name('home');

Route::get('acao', 'AcaoController@index');

Route::get('/create', 'ServidorController@create');

Route::get('/show','ServidorController@show');