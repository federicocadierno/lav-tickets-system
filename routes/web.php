<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', LoginController::class)
    ->middleware('throttle:2,1')
    ->name('login.attempt');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function (Request $request) {

    Auth::logout();
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');

})->name('logout');

Route::view('register', 'register')->name('register');
Route::post('register', RegisterController::class)->name('register.store');

Route::get('/tickets', [TicketsController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketsController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketsController::class, 'store'])->name('tickets.store');
//Route::post('/tickets/update', [TicketsController::class, 'update'])->name('tickets.update');
Route::put('/tickets/{ticket}', [TicketsController::class ,'update'])->name('tickets.update');

Route::get('/tickets/{id}/edit', [TicketsController::class, 'edit'])->name('tickets.edit');
Route::delete('/tickets/{id}/delete', [TicketsController::class, 'destroy'])->name('tickets.delete');
Route::get('/tickets/{id}/show', [TicketsController::class, 'show'])->name('tickets.show');
Route::get('/tickets/{id}/download', [TicketsController::class, 'download'])->name('tickets.download');

Route::get('/notifications', [\App\Http\Controllers\NotificationsController::class, 'notifications'])->name('notifications.index');
Route::get('/notifications/{databaseNotification}', [\App\Http\Controllers\NotificationsController::class, 'notification'])->name('notifications.show');
