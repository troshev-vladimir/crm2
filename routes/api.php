<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ClientsController;

Route::get('users', [UserController::class, 'index'])->middleware('user-role:User');
Route::get('users/{id}', [UserController::class, 'show'] )->middleware('user-role:User');
// Route::post('users', [UserController::class, 'store'] )->middleware('user-role:user');
Route::put('users/{id}', [UserController::class, 'update'] )->middleware('user-role:Manager');
Route::delete('users/{id}', [UserController::class, 'delete'] )->middleware('user-role:Admin');

// Route::middleware(['user-role:user'])->group(function()
// {
   
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(RolesController::class)->group(function () {
    Route::get('roles', 'index')->middleware('user-role:Admin');
    Route::get('roles/{id}', 'show')->middleware('user-role:Admin');
    Route::post('roles/{id}', 'attach')->middleware('user-role:Manager');
    Route::put('roles/{id}', 'detach')->middleware('user-role:Manager');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('departments', 'index');
});

Route::controller(ClientsController::class)->group(function () {
    Route::get('clients', 'index');
});