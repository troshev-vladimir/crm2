<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\departmentsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SaleController;

Route::get('users', [UserController::class, 'index'])->middleware('user-role:Manager');
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
    Route::get('departments/{userId}', 'userDepartments');
    Route::post('departments/{id}', 'attach');
    Route::put('departments/{id}', 'detach');
});

Route::controller(ClientsController::class)->group(function () {
    Route::get('clients', 'index')->middleware('department');
    // Route::get('clients/department/{id}', 'getByDepartment')
    Route::get('clients/{id}', 'show');
    Route::post('clients', 'store');
    Route::put('clients/{id}', 'update');
    Route::delete('clients/{id}', 'delete');

    Route::get('client-jobs/', 'getClientJobs');
    Route::get('client-activity/', 'getClientActivitys');
    Route::get('client-potential/', 'getClientPotentials');
    Route::get('client-metadata/', 'getClientMetadata');
});

Route::controller(EventController::class)->group(function () {
    Route::get('events/archive/', 'getArchive')->middleware('department');
    Route::get('events', 'index')->middleware('department');
    Route::get('events/{id}', 'show');
    Route::get('event-types', 'types');
    Route::post('events', 'store');
    Route::put('events/{id}', 'update');
    Route::delete('events/{id}', 'delete');
    Route::post('events/{id}/archive', 'archive');
});

Route::controller(SaleController::class)->group(function () {
    Route::get('sales', 'index')->middleware('department');
    Route::get('sales/{id}', 'show');
    Route::get('sales-types', 'types');
    Route::get('smi', 'smi');
    Route::post('sales', 'store');
    Route::put('sales/{id}', 'update');
    Route::delete('sales/{id}', 'delete');
});