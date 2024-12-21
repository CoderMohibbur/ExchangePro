<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CurrencyTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. All Time USD Sell
        $totalUsdSold = Exchange::where('exchange_type', 'sell')->sum('quantity');

        // 2. All Time USD Buy
        $totalUsdBought = Exchange::where('exchange_type', 'buy')->sum('quantity');

        // 3. All Time Profit in BDT
        $totalSellAmount = Exchange::where('exchange_type', 'sell')->sum('total_amount');
        $totalBuyAmount = Exchange::where('exchange_type', 'buy')->sum('total_amount');
        $totalProfitInBDT = $totalSellAmount - $totalBuyAmount;

        // 4. Total Due to Sellers
        $totalDueToSellers = Exchange::where('payment_status', 'Due')->sum('due_amount');

        // 5. Total Bank Balance in BDT
        $totalBankBalance = Bank::sum('balance');

        $banks = Bank::all();
        $currencies = Currency::all();

        return view('dashboard', compact(
            'totalUsdSold',
            'totalUsdBought',
            'totalProfitInBDT',
            'totalDueToSellers',
            'totalBankBalance',
            'banks',
            'currencies'
        ));

    }
    public function getNavbarMetrics()
    {
        $today = Carbon::today();

        $totalUsdBoughtToday = Exchange::where('exchange_type', 'buy')
            ->whereDate('created_at', $today)
            ->sum('quantity');

        $totalUsdSoldToday = Exchange::where('exchange_type', 'sell')
            ->whereDate('created_at', $today)
            ->sum('quantity');

                // Get the total amount of credit transactions (USD bought) for the specified currency
        $totalUsdBought = CurrencyTransaction::where('transaction_type', 'credit')  // Credit transactions represent USD bought
        ->sum('amount');

        // Get the total amount of debit transactions (USD sold) for the specified currency
        $totalUsdSold = CurrencyTransaction::where('transaction_type', 'debit')  // Debit transactions represent USD sold
        ->sum('amount');

        // Calculate the remaining USD to sell
        $remainingUsdToSell = $totalUsdBought - $totalUsdSold;

        $today = now()->toDateString(); // Get today's date

        // $totalSellAmountToday = Exchange::where('exchange_type', 'sell')
        //     ->whereDate('created_at', $today)
        //     ->sum('total_amount');

        // $totalBuyAmountToday = Exchange::where('exchange_type', 'buy')
        //     ->whereDate('created_at', $today)
        //     ->sum('total_amount');

        // // Calculate profit for today
        // $totalProfitTodayInBDT = $totalSellAmountToday - $totalBuyAmountToday;

        $today = now()->toDateString();

        // Get the total quantity of dollars sold today
        $totalQuantitySoldToday = Exchange::where('exchange_type', 'sell')
            ->whereDate('created_at', $today)
            ->sum('quantity');
        
        // Get the average selling rate for dollars sold today
        $averageSellRate = Exchange::where('exchange_type', 'sell')
            ->whereDate('created_at', $today)
            ->avg('rate');
        
        // Get the total amount spent purchasing those dollars
        $totalPurchaseCostForSoldDollarsToday = Exchange::where('exchange_type', 'buy')
            ->whereDate('created_at', $today)
            ->sum(DB::raw('quantity * rate'));
        
        // Calculate total bank fees for the day
        $totalBankFeesToday = Exchange::whereDate('created_at', $today)
            ->sum(DB::raw('npsb_fee + eft_beftn_fee + fixed_currency_fee + percent_currency_fee'));
        
        // Calculate profit
        $totalProfitTodayInBDT = ($totalQuantitySoldToday * $averageSellRate) - $totalPurchaseCostForSoldDollarsToday - $totalBankFeesToday;
        


        $totalBankBalance = Bank::sum('balance');

        $amountDueToSellersToday = Exchange::where('exchange_type', 'sell')
            ->whereDate('created_at', $today)
            ->where('payment_status', 'Due')
            ->sum('due_amount');

        return [
            'totalUsdBoughtToday' => $totalUsdBoughtToday,
            'totalUsdSoldToday' => $totalUsdSoldToday,
            'remainingUsdToSell' => $remainingUsdToSell,
            'profitOfTheDay' => $totalProfitTodayInBDT,
            'totalBankBalance' => $totalBankBalance,
            'amountDueToSellersToday' => $amountDueToSellersToday,
        ];
    }
}
