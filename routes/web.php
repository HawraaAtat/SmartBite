<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\MealHistoryController;

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
})->middleware('auth.redirect');


Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth.redirect');
Route::get('/signin', function () {
    return view('Authentication/signin');
})->middleware('auth.redirect');

Route::get('/test', function () {
    return view('test');
});
////////////////////////////////////////////Authentication

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('auth.redirect');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('signup', [AuthController::class, 'create_user'])->name('signup')->middleware('auth.redirect');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

////////////////////////////////////////////Forget Password
Route::get('/forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password')->middleware('auth.redirect');
Route::post('/forget-password', [AuthController::class, 'forgetPasswordPost' ])->name('forget.password.post');
Route::get('/forget-password/{token}', [AuthController::class, 'resetPassword' ])->name('reset.password')->middleware('auth.redirect');
Route::post('/reset-password', [AuthController::class, 'resetPasswordPost' ])->name('reset.password.post');


////////////////////////////////////////////User Profile
Route::get('profile', [AuthController::class, 'profile'])->name('profile')->middleware('checkAuthorization');
Route::post('update-profile/{id}', [AuthController::class, 'update_profile'])->name('update-profile');
Route::get('edit-profile', [AuthController::class, 'edit_profile'])->name('edit-profile')->middleware('checkAuthorization');

////////////////////////////////////////////Dashboard
Route::get('dashboard', [RecipeController::class, 'dashboard'])->name('dashboard')->middleware('checkAuthorization');;
////////////////////////////////////////////Like Recipes
Route::post('/favorites/{recipeId}', [FavoritesController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{recipeId}', [FavoritesController::class, 'destroy'])->name('favorites.destroy');
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index')->middleware('checkAuthorization');

////////////////////////////////////////////Meal History
Route::post('/meal-history/{userId}/{recipeId}', [MealHistoryController::class,'store'])->name('meal-history.store');
Route::get('/meal-history', [MealHistoryController::class, 'index'])->name('meal-history.index')->middleware('checkAuthorization');
////////////////////////////////////////////Reset Password From Profile
Route::get('edit-password', [AuthController::class, 'edit_password'])->name('edit-password')->middleware('checkAuthorization');
Route::post('update-password/{id}', [AuthController::class, 'update_password'])->name('update-password');
