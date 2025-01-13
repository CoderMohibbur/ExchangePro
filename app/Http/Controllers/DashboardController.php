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

        // $today = now()->toDateString();

        // // Get the total quantity of dollars sold today
        // $totalQuantitySoldToday = Exchange::where('exchange_type', 'sell')
        //     ->whereDate('created_at', $today)
        //     ->sum('quantity');

        // // Get the average selling rate for dollars sold today
        // $averageSellRate = Exchange::where('exchange_type', 'sell')
        //     ->whereDate('created_at', $today)
        //     ->avg('rate');

        // // Get the total amount spent purchasing those dollars
        // $totalPurchaseCostForSoldDollarsToday = Exchange::where('exchange_type', 'buy')
        //     ->whereDate('created_at', $today)
        //     ->sum(DB::raw('quantity * rate'));

        // // Calculate total bank fees for the day
        // $totalBankFeesToday = Exchange::whereDate('created_at', $today)
        //     ->sum(DB::raw('npsb_fee + eft_beftn_fee + fixed_currency_fee + percent_currency_fee'));

        // // Calculate profit
        // $totalProfitTodayInBDT = ($totalQuantitySoldToday * $averageSellRate) - $totalPurchaseCostForSoldDollarsToday - $totalBankFeesToday;


    //     // Today's date
    //     $totalProfitTodayInBDT = DB::table('exchanges')
    //         ->selectRaw("
    //     ROUND(
    //         (
    //             SUM(CASE WHEN exchange_type = 'sell' THEN total_amount ELSE 0 END)
    //             -
    //             SUM(
    //                 CASE 
    //                     WHEN exchange_type = 'buy' THEN 
    //                         ROUND(total_amount, 2) 
    //                         + ROUND(npsb_fee, 2) 
    //                         + ROUND(eft_beftn_fee, 2) 
    //                         + ROUND(fixed_currency_fee, 2) 
    //                     ELSE 0 
    //                 END
    //             )
    //         ), 2
    //     ) AS profit
    // ")
    //         ->whereDate('date_time', Carbon::today())
    //         ->value('profit');

    // $totalProfitTodayInBDT = DB::table('exchanges')
    // ->selectRaw("
    //     ROUND(
    //         SUM(CASE WHEN exchange_type = 'sell' THEN total_amount ELSE 0 END)
    //         -
    //         SUM(CASE WHEN exchange_type = 'buy' THEN 
    //             (orginal_quantity * 
    //             (ROUND(total_amount / orginal_quantity, 2) + 
    //             ROUND(npsb_fee / orginal_quantity, 2) + 
    //             ROUND(eft_beftn_fee / orginal_quantity, 2) + 
    //             ROUND(fixed_currency_fee / orginal_quantity, 2))) 
    //             ELSE 0 END)
    //         , 2
    //     ) AS profit
    // ")
    // ->whereDate('date_time', Carbon::today())
    // ->value('profit');

    // Calculate total profit from sold dollars based on matching purchases
// $totalProfitTodayInBDT = DB::table('exchanges as sell')
//     ->selectRaw("
//         ROUND(
//             (
//                 SUM(CASE WHEN sell.exchange_type = 'sell' THEN sell.total_amount ELSE 0 END)
//                 -
//                 (
//                    SELECT SUM(
//                         ROUND(buy.total_amount / buy.quantity, 2) * 
//                         GREATEST(
//                             LEAST(sell_quantity.total_sold_quantity, buy.quantity),
//                             0
//                         )
//                         +
//                         ROUND(buy.npsb_fee / buy.quantity, 2) * 
//                         GREATEST(
//                             LEAST(sell_quantity.total_sold_quantity, buy.quantity),
//                             0
//                         )
//                         +
//                         ROUND(buy.eft_beftn_fee / buy.quantity, 2) * 
//                         GREATEST(
//                             LEAST(sell_quantity.total_sold_quantity, buy.quantity),
//                             0
//                         )
//                         +
//                         ROUND(buy.fixed_currency_fee / buy.quantity, 2) * 
//                         GREATEST(
//                             LEAST(sell_quantity.total_sold_quantity, buy.quantity),
//                             0
//                         )
//                         +
//                         ROUND(
//                             (buy.total_amount * buy.percent_currency_fee / 100) / buy.quantity, 2
//                         ) * 
//                         GREATEST(
//                             LEAST(sell_quantity.total_sold_quantity, buy.quantity),
//                             0
//                         )
//                     )

//                     FROM exchanges as buy
//                     CROSS JOIN (
//                         SELECT SUM(orginal_quantity) as total_sold_quantity 
//                         FROM exchanges 
//                         WHERE exchange_type = 'sell' 
//                         AND date(date_time) = ?
//                     ) as sell_quantity
//                     WHERE buy.exchange_type = 'buy'
//                     AND date(buy.date_time) = ?
//                 )
//             ), 2
//         ) AS profit
//     ", [Carbon::today(), Carbon::today()])
//     ->where('sell.exchange_type', '=', 'sell')
//     ->whereDate('sell.date_time', Carbon::today())
//     ->value('profit');

    //    // Define the start and end of today
    // $todayStart = Carbon::today()->startOfDay();
    // $todayEnd = Carbon::today()->endOfDay();

    // // Query to calculate today's total sell profit
    // $totalSellProfit = DB::table('exchanges')
    //     ->where('exchange_type', 'sell')
    //     ->whereBetween('date_time', [$todayStart, $todayEnd])
    //     ->selectRaw("
    //         SUM((quantity * rate)) AS totalSellProfit
    //     ")
    //     ->value('totalSellProfit');

    // // Query to calculate today's total buy cost
    // $totalBuyCost = DB::table('exchanges')
    //     ->where('exchange_type', 'buy')
    //     ->whereBetween('date_time', [$todayStart, $todayEnd])
    //     ->selectRaw("
    //         SUM((orginal_quantity * rate) + npsb_fee + eft_beftn_fee) AS totalBuyCost
    //     ")
    //     ->value('totalBuyCost');

    // // Calculate total profit for today in BDT
    // $totalProfitTodayInBDT = $totalSellProfit - $totalBuyCost;

    // Define the start and end of today
    $todayStart = Carbon::today()->startOfDay();
    $todayEnd = Carbon::today()->endOfDay();
    $todayDate = Carbon::today()->format('Y-m-d');

    // Calculate total dollars sold today and revenue from sales
    $sellData = DB::table('exchanges')
        ->where('exchange_type', 'sell')
        ->whereBetween('date_time', [$todayStart, $todayEnd])
        ->selectRaw("SUM(quantity) AS totalSoldQuantity, SUM(quantity * rate) AS totalRevenue")
        ->first();

    $totalSoldQuantity = $sellData->totalSoldQuantity ?? 0;
    $totalRevenue = $sellData->totalRevenue ?? 0;

    // Calculate total dollars bought and their costs, including percent_currency_fee
    $buyData = DB::table('exchanges')
        ->where('exchange_type', 'buy')
        ->selectRaw("SUM(quantity) AS totalBoughtQuantity, 
                    SUM((quantity * rate) + npsb_fee + eft_beftn_fee ) AS totalCost")
        ->first();

    $totalBoughtQuantity = $buyData->totalBoughtQuantity ?? 0;
    $totalCost = $buyData->totalCost ?? 0;

    // Adjusted calculation of the proportional cost of sold dollars
    $costOfSoldDollars = 0;
    if ($totalBoughtQuantity > 0 && $totalSoldQuantity > 0) {
        // Calculate the proportional cost based on the sold quantity
        $costOfSoldDollars = ($totalSoldQuantity / $totalBoughtQuantity) * $totalCost;
    }

    // Calculate the profit
    $totalProfitTodayInBDT = $totalRevenue - $costOfSoldDollars;
    $totalProfitTodayInBDTFormatted = number_format($totalProfitTodayInBDT, 2);
        
    $totalBankBalance = Bank::sum('balance');

        $amountDueToSellersToday = Exchange::where('exchange_type', 'sell')
            ->whereDate('created_at', $today)
            ->where('payment_status', 'Due')
            ->sum('due_amount');

        return [
            'totalUsdBoughtToday' => $totalUsdBoughtToday,
            'totalUsdSoldToday' => $totalUsdSoldToday,
            'remainingUsdToSell' => $remainingUsdToSell,
            'profitOfTheDay' => $totalProfitTodayInBDTFormatted,
            'totalBankBalance' => $totalBankBalance,
            'amountDueToSellersToday' => $amountDueToSellersToday,
        ];
    }
}