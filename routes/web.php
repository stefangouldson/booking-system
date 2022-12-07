<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');
    Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');
    Route::post('/book/{roomId}', [RoomsController::class, 'book'])->name('book-room');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified','isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // Rooms CRUD
    Route::post('/create-room', [AdminController::class, 'store'])->name('add-room');
    Route::get('/edit-room/{id}', [AdminController::class, 'edit'])->name('edit-room');
    Route::post('/update-room/{id}', [AdminController::class, 'update'])->name('update-room');
    Route::post('/delete-room/{id}', [AdminController::class, 'deleteRoom'])->name('delete-room');
});
