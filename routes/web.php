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
Route::get('profile/{id}', [AuthController::class, 'profile'])->name('profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password');
Route::post('/forget-password', [AuthController::class, 'forgetPasswordPost' ])->name('forget.password.post');
Route::get('/forget-password/{token}', [AuthController::class, 'resetPassword' ])->name('reset.password');
Route::post('/reset-password', [AuthController::class, 'resetPasswordPost' ])->name('reset.password.post');

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('create-user', [AuthController::class, 'create_user'])->name('user.create');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('edit-profile/{id}', [AuthController::class, 'edit_profile'])->name('edit-profile');
Route::post('update-profile/{id}', [AuthController::class, 'update_profile'])->name('update-profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password');

//////////////////////////
Route::get('dashboard/{id}', [RecipeController::class, 'dashboard'])->name('dashboard');
// Route::get('favorites/{id}', [FavoritesController::class, 'index'])->name('favorites');
// Route::post('/add-to-favorites', [FavoritesController::class, 'addToFavorites']);


Route::middleware('auth')->post('/favorites/{recipeId}', [FavoritesController::class, 'store'])->name('favorites.store');
Route::middleware('auth')->delete('/favorites/{recipeId}', [FavoritesController::class, 'destroy'])->name('favorites.destroy');
Route::middleware('auth')->get('/favorites/{id}', [FavoritesController::class, 'index'])->name('favorites.index');

Route::post('/meal-history/{userId}/{recipeId}', [MealHistoryController::class,'store'])->name('meal-history.store');



//////////////////////////
