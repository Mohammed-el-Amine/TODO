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

Route::get('/event/{id}', [EventsController::class, 'show'])->name('events.show');
Route::get('/event', [EventsController::class, 'index'])->name('events.index');
Route::get('/add/event',[EventsController::class, 'create'])->name(('events.create'));
Route::post('/add/event', [EventsController::class, 'store'])->name('events.store');

Route::fallback(function () {
    abort(404);
});
