<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('user.login');



Route::get('/signin', function(){
    return view('signin');
})->name('user.signin');


Route::get('/user', function (Request $request) {
    $name = $request->query('username');
    $email = $request->query('useremail');
    $password = $request->query('password');
    echo $name . '<br>' . $email . '<br>' . $password;
})->name('api-user');


