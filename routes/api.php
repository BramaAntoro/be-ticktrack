<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('sanctum.guest')->group(function() {

    Route::post('login', [AuthController::class, 'login']);

    Route::post('/register', [AuthController::class, 'register']);
    
});

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::post('/ticket', [TicketController::class, 'store']);
    Route::get('/ticket', [TicketController::class, 'index']);
    Route::get('/ticket/{code}', [TicketController::class, 'show']);
    Route::patch('/ticket-reply/{code}', [TicketController::class, 'update']);

    Route::get('/dashboard/statistics', [DashboardController::class, 'getStatistics']);

});