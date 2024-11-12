<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('dashboard', compact(
            'totalUsdSold',
            'totalUsdBought',
            'totalProfitInBDT',
            'totalDueToSellers',
            'totalBankBalance'
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

        $remainingUsdToSell = $totalUsdBoughtToday - $totalUsdSoldToday;

        $today = now()->toDateString(); // Get today's date

        $totalSellAmountToday = Exchange::where('exchange_type', 'sell')
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        $totalBuyAmountToday = Exchange::where('exchange_type', 'buy')
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        // Calculate profit for today
        $totalProfitTodayInBDT = $totalSellAmountToday - $totalBuyAmountToday;

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
