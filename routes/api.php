<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TaskManagerController;






Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('tasks', [TaskManagerController::class, 'index']);
    Route::post('tasks', [TaskManagerController::class, 'store']);
    Route::put('/tasks/{id}', [TaskManagerController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskManagerController::class, 'destroy']);
});
