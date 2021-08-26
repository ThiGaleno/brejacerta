<?php

use App\Http\Controllers\Api\BeerController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BeerController::class, 'index'])->name('beer.index');
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('login', [AuthController::class, 'login'])->name('user.login');
Route::get('beer/{id}', [BeerController::class, 'getBeerById']);

//Rotas autenticadas
Route::group(['middleware' => 'apiJwt'], function(){
    Route::post('logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::post('/beer/review/{id}', [ReviewController::class, 'reviewStore'])->name('beer.review.store');
    Route::post('/delete/{id}', [BeerController::class, 'delete'])
});

Route::group(['middleware' => 'admin'], function(){
    Route::post('/beer/store', [BeerController::class, 'beerStore'])->name('beer.store');
});
