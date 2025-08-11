<?php

use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;

// Agrega esta línea para la creación de tickets
Route::post('/tickets', [TicketController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tickets/all', [TicketController::class, 'allTickets']);
    Route::get('/tickets/mine', [TicketController::class, 'myTickets']);
    Route::get('/tickets/assigned', [TicketController::class, 'assignedTickets']);
});