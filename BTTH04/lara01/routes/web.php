<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;

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
    return view('home');
});

Route::get('/welcome',[welcomeController::class, "welcome"])-> name("welcome.welcome");
Route::post('/welcome',[welcomeController::class, "save"])-> name("welcome.save");

// Route::get("posts", [PostController::class,"getAllPosts"]);
// Route::get("categories", [CategoryController::class,"getAllCategories"]);
// Route::resource("categories", [PostController::class]);