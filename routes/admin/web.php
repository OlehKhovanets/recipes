<?php

use Illuminate\Support\Facades\Route;
use App\Http\Admin\Controllers\Recipes\RecipeController;
use App\Http\Admin\Controllers\Auth\SignInController;
use App\Http\Admin\Controllers\Auth\LoginController;
use App\Http\Admin\Controllers\Ingredients\IngredientController;

//Route::group(['middleware' => 'is_admin'], function () {

    Route::group(['prefix' => '/ingredients', 'middleware' => 'checkAuth'], function () {
        Route::get('/', [IngredientController::class, 'index'])->name('admin.ingredients');
        Route::get('/create', [IngredientController::class, 'create'])->name('admin.ingredients.create');
        Route::post('/store', [IngredientController::class, 'store'])->name('admin.ingredients.store');
        Route::get('/{id}/edit', [IngredientController::class, 'edit'])->name('admin.ingredients.edit');
        Route::post('/{id}/update', [IngredientController::class, 'update'])->name('admin.ingredients.update');
    });

    Route::group(['prefix' => '/recipe-builder', 'middleware' => 'checkAuth'], function () {
        Route::get('/', [RecipeController::class, 'index'])->name('admin.recipes.index');
        Route::get('/{id}/edit', [RecipeController::class, 'edit'])->name('admin.recipes.edit');
        Route::get('/create', [RecipeController::class, 'create'])->name('admin.recipes.create');
        Route::get('/{id}/delete', [RecipeController::class, 'delete'])->name('admin.recipes.delete');
        Route::post('/{id}/upload-image', [RecipeController::class, 'uploadImage'])->name('admin.recipes.upload-image');
    });

//Auth
Route::post('login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/sign-in', [SignInController::class, 'index'])->name('admin.sign-in');

//API
/*QUESTIONS*/
Route::group(['prefix' => '/api', 'middleware' => 'checkAuth'], function () {
    Route::post('/recipes/{id}', [\App\Http\Controllers\Api\Recipes\RecipeController::class, 'update'])->name('question.update');
    Route::post('/recipes', [\App\Http\Controllers\Api\Recipes\RecipeController::class, 'create'])->name('question.create');
});
