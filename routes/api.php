<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::apiResource('users', UserController::class);
Route::apiResource('companies', CompanyController::class);
