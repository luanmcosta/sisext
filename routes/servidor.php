<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('servidor')->user();

    //dd($users);

    return view('servidor.home');
})->name('home');

