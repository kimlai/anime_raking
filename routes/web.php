<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AnimeController::class, "showAll"]);
Route::get('/anime/{id}', [AnimeController::class, "showOne"]);

Route::get('/anime/{id}/new_review', [ReviewController::class, "newReview"])
->middleware('auth'); // redirection vers la page de login si pas authentifié

Route::get('/login', [AuthenticationController::class, "loginForm"])
->name('login'); // on donne un nom à la route, qui sera utilisé par le middleware d'authentification
Route::post('/login', [AuthenticationController::class, "attemptLogin"]);
Route::get('/signup', [AuthenticationController::class, "signupForm"]);
Route::post('/signup', [AuthenticationController::class, "register"]);
Route::post('/signout', [AuthenticationController::class, "signOut"]);
