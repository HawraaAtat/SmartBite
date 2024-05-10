<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MealHistoryController;

use App\Http\Controllers\RecipeController;

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

Route::middleware('not_authenticated')->group(function () {
    Route::get('/welcome', function () { return view('welcome'); });
    Route::get('/', function () { return view('onboarding'); });

    Route::get('login', function () { return view('Authentication/login'); });
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('signup', [AuthController::class, 'createUser'])->name('signup');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');

});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password');
Route::post('forget-password', [AuthController::class, 'forgetPasswordPost' ])->name('forget.password.post');
Route::get('forget-password/{token}', [AuthController::class, 'resetPassword' ])->name('reset.password');
Route::post('reset-password', [AuthController::class, 'resetPasswordPost' ])->name('reset.password.post');

Route::middleware('authenticated')->group(function () {
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('update-profile/{id}', [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::get('edit-profile', [AuthController::class, 'editProfile'])->name('edit-profile');

    Route::get('dashboard', [RecipeController::class, 'dashboard'])->name('dashboard');

    Route::post('dashboard/recipe/{id}', [RecipeController::class, 'recipe'])->name('dashboard.recipe');

    Route::post('favorites/{recipeId}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('favorites/{recipeId}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');

    Route::post('meal-history/{userId}/{recipeId}', [MealHistoryController::class,'store'])->name('meal-history.store');
    Route::get('meal-history', [MealHistoryController::class, 'index'])->name('meal-history.index');
    Route::get('edit-password', [AuthController::class, 'editPassword'])->name('edit-password');
    Route::post('update-password/{id}', [AuthController::class, 'updatePassword'])->name('update-password');
});
