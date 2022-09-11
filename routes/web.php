<?php

use App\Http\Controllers\{CardController, LoginController, UserController};
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/login', fn (): View => view('login.login'))->name('login');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth');

Route::middleware('auth')->group(function (): void {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [UserController::class, 'getHome'])->name('home');
    Route::get('/profile', [UserController::class, 'getProfile'])->name('profile');

    Route::prefix('card')->name('card.')->group(function (): void {
        Route::get('/', [CardController::class, 'getCards'])->name('self');
        Route::get('/create', [CardController::class, 'getForm'])->name('create.form');
        Route::get('/edit/{card}', [CardController::class, 'getForm'])->name('edit.form');
        Route::post('/create', [CardController::class, 'create'])->name('create');
        Route::post('/edit/{card}', [CardController::class, 'edit'])->name('edit');
    });
});

