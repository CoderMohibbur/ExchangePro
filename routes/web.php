<?php

use App\Http\Middleware\BlockIP;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\BlockedIpController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BankBalanceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BankTransactionController;
use App\Http\Controllers\CurrencyReserveController;
use App\Http\Controllers\CurrencyTransactionController;
use App\Http\Controllers\CurrencyReserveTransactionController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', BlockIP::class])->group(function () {
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
    Route::get('/exchanges/{exchange}/payment', [ExchangeController::class, 'completePartialPaymentForm'])->name('exchanges.payment');
    Route::post('/exchanges/{exchange}/payment', [ExchangeController::class, 'completePartialPayment'])->name('exchanges.completePartialPayment');

    Route::get('/exchanges/currencies', [ExchangeController::class, 'currencies'])->name('exchanges.currencies');
    Route::get('/exchanges/buy', [ExchangeController::class, 'buyDollar'])->name('exchanges.buy');
    Route::post('/exchanges/buy-dollar-store', [ExchangeController::class, 'buyDollarStore'])->name('exchanges.buyDollarStore');
    Route::post('/exchanges/sell-dollar-store', [ExchangeController::class, 'sellDollarStore'])->name('exchanges.sellDollarStore');
    Route::get('/exchanges/sell', [ExchangeController::class, 'sellDollar'])->name('exchanges.sell');
    Route::resource('exchanges', ExchangeController::class);

    Route::resource('companies', CompanyController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::get('/banks/{bank}/withdraw', [BankController::class, 'showWithdrawForm'])->name('banks.withdrawForm');
    Route::post('/banks/{bank}/withdraw', [BankController::class, 'processWithdraw'])->name('banks.withdraw');
    Route::get('/banks/{bank}/deposit', [BankController::class, 'depositForm'])->name('banks.depositForm');
    Route::post('/banks/{bank}/deposit', [BankController::class, 'processDeposit'])->name('banks.processDeposit');
    Route::resource('banks', BankController::class);
    Route::resource('bank_balances', BankBalanceController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('user_types', UserTypeController::class);
    Route::resource('users', UserController::class);
    Route::post('currency_reserve/{currencyReserve}/adjust', [CurrencyReserveController::class, 'adjustBalance'])->name('currency_reserve.adjust');
    Route::resource('currency_reserve', CurrencyReserveController::class);
    Route::resource('currency_transactions', CurrencyTransactionController::class);
    Route::resource('bank_transactions', BankTransactionController::class);
    Route::resource('blocked-ips', BlockedIpController::class);


    Route::get('/get-bank-fees/{bankId}', [BankController::class, 'getFees']);
    Route::get('/get-currency-fees/{currencyId}', [CurrencyController::class, 'getFees']);
    // Route::post('/users/store', [UserController::class, 'storesave']);
    Route::post('/users', [UserController::class, 'storesave'])->name('users.storesave');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/status/{status}', [TicketController::class, 'filter'])->name('tickets.filter');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');



});

require __DIR__ . '/auth.php';
