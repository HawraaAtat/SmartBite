<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('onboarding');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/signin', function () {
    return view('Authentication/signin');
});

Route::get('/resetpassword', function () {
    return view('Authentication/resetpassword');
});

Route::get('/signup', function () {
    return view('Authentication/signup');
});


