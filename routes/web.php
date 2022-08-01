<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PasswordValid;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);
Route::post('/login', [WelcomeController::class, 'login'])->name('welcome.login');
Route::get('/logout', [WelcomeController::class, 'logout'])->name('welcome.logout');
Route::get('/test', [WelcomeController::class, 'fetchFivePosts'])->name('welcome.fetchonepost');
