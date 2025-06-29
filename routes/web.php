<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\PredictionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('web.about');

Route::post('/predict', [PredictionController::class, 'predict'])->name('predict');

Route::get('/predict', function () {
    return view('form-predict');
});

Route::get('/recipes', function () {
    return view('recipes');
});

Route::get('/recipes/mie-goreng', function () {
    return view('recipes.show');
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{slug}', [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/recipes', [RecipeController::class, 'uploadForm'])->name('recipes.upload.form');
Route::post('/recipes', [RecipeController::class, 'deteksiMakanan'])->name('recipes.upload.detected');

Route::get('/blog', [BlogPostController::class, 'index'])->name('web.blog.index');
Route::get('/blog/{slug}', [BlogPostController::class, 'show'])->name('web.blog.show');

Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return '✅ Storage linked!';
});
