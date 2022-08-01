<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/get-token', [WelcomeController::class, 'getToken'])->name('welcome.token');
Route::middleware('auth:sanctum')->get('/kanye-rest', [WelcomeController::class, 'fetchFivePosts'])->name('welcome.fiveposts');

