<?php

use App\Livewire\BoardIndex;
use App\Livewire\BoardShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Workspace\Create as WorkspaceCreate;
use App\Livewire\Workspace\Index as WorkspaceIndex;
use App\Livewire\Workspace\Show as WorkspaceShow;
// use App\Livewire\Workspace\Create as BoardCreate;
use App\Livewire\Board\Create as BoardCreate;
use App\Http\Controllers\WorkspaceController;
use App\Livewire\Board\Delete as BoardDelete;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\CardController;




Route::view('/', 'welcome');

Route::get('/dashboard', \App\Livewire\BoardIndex::class)
->middleware(['auth', 'verified'])
->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');







Route::middleware('auth')->group(function () {
    Route::resource('workspaces', WorkspaceController::class);



Route::resource('boards', BoardController::class);});
Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');
Route::get('/workspaces/{workspace}/boards/create', BoardCreate::class)
    ->middleware('auth')
    ->name('boards.create');

Route::get('/boards/{board}/edit', [BoardController::class, 'edit'])->name('boards.edit');
Route::delete('/boards/{board}', [BoardController::class, 'destroy'])
    ->middleware('auth')
    ->name('boards.destroy');


Route::get('/cards', [App\Http\Controllers\CardController::class, 'index'])
    ->middleware('auth')
    ->name('cards.index');
Route::middleware(['auth'])->group(function () {
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
    Route::resource('cards', \App\Http\Controllers\CardController::class);




Route::post('/columns', [ColumnController::class, 'store'])->name('columns.store');
Route::get('/columns/{column}/edit', [ColumnController::class, 'edit'])->name('columns.edit');
Route::put('/columns/{column}', [ColumnController::class, 'update'])->name('columns.update');
Route::delete('/columns/{column}', [ColumnController::class, 'destroy'])->name('columns.destroy');

});








require __DIR__.'/auth.php';
