<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MealHistoryController;
use App\Http\Controllers\SpoonAPIchatController;
use App\Http\Controllers\AccordionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;
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
    Route::get('/welcome', function () {
        return response(view('welcome'))->header('Cache-Control', 'no-store');
    });

    Route::get('/', function () {
        return response(view('onboarding'))->header('Cache-Control', 'no-store');
    });

    Route::get('login', function () {
        return response(view('Authentication/login'))->header('Cache-Control', 'no-store');
    });

    Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:5,1');

    Route::get('signup', [AuthController::class, 'createUser'])->name('signup');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup');

    Route::get('forget-password', [AuthController::class, 'forgetPassword' ])->name('forget.password');
    Route::post('forget-password', [AuthController::class, 'forgetPasswordPost' ])->name('forget.password.post');
    Route::get('forget-password/{token}', [AuthController::class, 'resetPassword' ])->name('reset.password');
    Route::post('reset-password', [AuthController::class, 'resetPasswordPost' ])->name('reset.password.post');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('authenticated')->group(function () {
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('update-profile/{id}', [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::get('edit-profile', [AuthController::class, 'editProfile'])->name('edit-profile');

    Route::get('dashboard', [RecipeController::class, 'dashboard'])->name('dashboard');

    Route::post('dashboard/recipe/{id}', [RecipeController::class, 'recipe'])->name('dashboard.recipe');

    Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('favorites/{id}', [FavoriteController::class, 'show'])->name('favorites.show');
    Route::post('favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('favorites/{recipeId}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    Route::get('meal-history', [MealHistoryController::class, 'index'])->name('meal-history.index');
    Route::get('meal-history/{id}', [MealHistoryController::class, 'show'])->name('meal-history.show');
    Route::post('meal-history', [MealHistoryController::class,'store'])->name('meal-history.store');

    Route::get('edit-password', [AuthController::class, 'editPassword'])->name('edit-password');
    Route::post('update-password/{id}', [AuthController::class, 'updatePassword'])->name('update-password');

    Route::get('/spoonchat', [RecipeController::class, 'chatbotview'])->name('spoonchat');
Route::get('/spoonapi-chat', [SpoonAPIchatController::class, 'mealSuggest'])->name('spoonapi-chat');
Route::get('/spoonapi-foodlist', [SpoonAPIchatController::class, 'listLogicalInputs'])->name('spoonapi-foodlist');
Route::get('/spoonapianswer', [SpoonAPIchatController::class, 'foodSuggest'])->name('spoonapianswer');
//baadne 3m bshtghl 3lyha
Route::get('/spoonapicoversation', [SpoonAPIchatController::class, 'store3'])->name('spoonapicoversation');

});

Route::fallback(function () {
    return view('404-not-found');
});





Route::get('/assistant', [AccordionController::class, 'index'])->name('assistant');
Route::get('/searchbyingredients', [AccordionController::class, 'store'])->name('searchbyingredients');
Route::get('/searchingredientinfo', [AccordionController::class, 'store2'])->name('searchingredientinfo');
Route::get('/computeingredientamount', [AccordionController::class, 'store3'])->name('computeingredientamount');
Route::get('/getingredientsubstitutes', [AccordionController::class, 'store4'])->name('getingredientsubstitutes');

Route::get('faq', [AuthController::class, 'faq'])->name('faq');
Route::get('contact', [AuthController::class, 'contact'])->name('contact');

Route::post('contactUs', [ContactController::class, 'store'])->name('contactUs');
Route::post('/send-email', [MailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
