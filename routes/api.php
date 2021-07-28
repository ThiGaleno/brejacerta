<?php

use App\Http\Controllers\Api\BeerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BeerController::class, 'index'])->name('beer.index');

Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('login', [AuthController::class, 'login'])->name('user.login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['Middleware' => 'apiJwt'], function(){
    Route::post('logout', [AuthController::class, 'logout'])->name('user.logout');
});
