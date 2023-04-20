<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('categories')->controller(CategoryController::class)->group(function() {
        Route::get('/', 'getCategories');
        Route::post('/', 'postCategories');
        Route::put('/', 'putCategories');
    });

    Route::prefix('recipes')->controller(RecipeController::class)->group(function() {
        Route::get('/', 'getRecipes');
        Route::post('/', 'postRecipes');
        Route::put('/', 'putRecipes');
    });
});

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});
