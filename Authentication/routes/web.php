<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('user.login');



Route::get('/signin', function(){
    return view('signin');
})->name('user.signin');
