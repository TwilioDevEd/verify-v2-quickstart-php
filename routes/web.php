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

Route::namespace('Auth')->group(function () {

    Route::get('/login', function(){
        return view('auth.login');
    })->name('login');
    Route::post('/login', 'LoginController@login');

    Route::get('/register', function(){
        return view('auth.register');
    })->name('register');
    Route::post('/register', 'RegisterController@register');

    Route::get('/verify', 'VerificationController@show');
    Route::post('/verify', 'VerificationController@verify');
    Route::post('/resend', 'VerificationController@resend');

    Route::get('/logout', 'LoginController@logout');
});

Route::view('/', 'secrets')->middleware('auth')->middleware('verified');

Route::view('/users', 'users');
