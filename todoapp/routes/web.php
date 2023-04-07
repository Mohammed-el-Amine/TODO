<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EventsController::class, 'index'])->name('events.index');
Route::get('/event', [EventsController::class, 'getEventsByDateRange'])->name('events.getByDateRange');

Route::get('/event/{id}', [EventsController::class, 'show'])->name('events.show');
Route::put('update/event/{id}', [EventsController::class, 'update'])->name('events.update');

Route::delete('/events/{id}', [EventsController::class, 'destroy'])->name('events.destroy');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

Route::get('/add/event', [EventsController::class, 'create'])->name(('events.create'));
Route::post('/add/event', [EventsController::class, 'store'])->name('events.store');

Route::get('/update/event/{id}', [EventsController::class, 'edit'])->name('events.edit');

Route::fallback(function () {
    abort(404);
});