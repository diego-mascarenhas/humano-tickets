<?php

use Illuminate\Support\Facades\Route;
use Idoneo\HumanoTickets\Http\Controllers\TicketController;

Route::middleware(['web', 'auth'])->group(function ()
{
	// Tickets
	Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
	Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
	Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
});

