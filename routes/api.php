<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/v1/tasks', TaskController::class);
Route::put('/v1/tasks/{task}/finish', [TaskController::class, 'finish']);
