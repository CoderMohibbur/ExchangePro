<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\BankBalanceController;
use App\Http\Controllers\TransactionController;

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
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

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
    Route::resource('currencies', CurrencyController::class);
    Route::resource('banks', BankController::class);
    Route::resource('bank_balances', BankBalanceController::class);
    Route::resource('transactions', TransactionController::class);



});

require __DIR__ . '/auth.php';
