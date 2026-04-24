<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('login');


Route::get('/signin', function(){
    return view('signin');
})->name('user.signin');


Route::post('/user', function (Request $request) {
    dd($request->all());
})->name('api-user');


Route::get('/user/sessions', function (Request $request) {
    dd($request->session()->all());
})->name('api-user');


