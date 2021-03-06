<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/home');
});

Route::resource('relatorio', 'RelatorioController');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'servidor'], function () {
  Route::get('/login', 'ServidorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ServidorAuth\LoginController@login');
  Route::post('/logout', 'ServidorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ServidorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ServidorAuth\RegisterController@register');

  Route::post('/password/email', 'ServidorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ServidorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ServidorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ServidorAuth\ResetPasswordController@showResetForm');
});
