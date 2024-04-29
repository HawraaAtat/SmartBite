<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\RecipeController;

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


Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/signin', function () {
    return view('Authentication/signin');
});

Route::get('/test', function () {
    return view('test');
});


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('signup', [AuthController::class, 'create_user'])->name('signup');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password');

Route::post('/forget-password', [AuthController::class, 'forgetPasswordPost' ])->name('forget.password.post');
Route::get('/forget-password/{token}', [AuthController::class, 'resetPassword' ])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'resetPasswordPost' ])->name('reset.password.post');

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('create-user', [AuthController::class, 'create_user'])->name('user.create');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password');

//////////////////////////
Route::get('dashboard', [RecipeController::class, 'dashboard'])->name('dashboard');
//////////////////////////
