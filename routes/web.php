<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExchangeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/exchanges/pending', [ExchangeController::class, 'pending'])->name('exchangePending');
    Route::get('/exchanges/canceled', [ExchangeController::class, 'canceled'])->name('exchanges.canceled');
    Route::get('/exchanges/refunded', [ExchangeController::class, 'refunded'])->name('exchanges.refunded');
    Route::get('/exchanges/approved', [ExchangeController::class, 'approved'])->name('exchanges.approved');
    //currencies
    Route::get('/exchanges/currencies', [ExchangeController::class, 'currencies'])->name('exchanges.currencies');
    Route::resource('exchanges', ExchangeController::class);

    Route::resource('companies', CompanyController::class);
    Route::resource('roles', RoleController::class);

});

require __DIR__ . '/auth.php';
