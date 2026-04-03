<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('user.login');



Route::get('/signin', function(){
    return view('signin');
})->name('user.signin');


Route::post('/user', function (Request $request) {
    dd($request->all());
})->name('api-user');


