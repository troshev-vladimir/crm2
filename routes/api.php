<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::get('users', [UserController::class, 'index'] );
Route::get('users/{id}', [UserController::class, 'show'] );
Route::post('users', [UserController::class, 'store'] );
Route::put('users/{id}', [UserController::class, 'update'] );
Route::delete('users/{id}', [UserController::class, 'delete'] );


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});