<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'name' => 'Payoneer',
                'code' => 'USD',
                'exchange_rate' => 1.00,
                'cur_sym' => '$',
                'sell_at' => 100.00,
                'buy_at' => 98.00,
                'fixed_charge_for_sell' => 2.00,
                'percent_charge_for_sell' => 1.5,
                'fixed_charge_for_buy' => 1.50,
                'percent_charge_for_buy' => 1.0,
                'reserve' => 0,
                'minimum_limit_for_sell' => 10.00,
                'maximum_limit_for_sell' => 500.00,
                'minimum_limit_for_buy' => 20.00,
                'maximum_limit_for_buy' => 600.00,
                'instruction' => 'Transfer within 24 hours',
                'image' => 'currencies/payoneer.png',
                'available_for_sell' => true,
                'available_for_buy' => true,
                'show_rate' => true,
            ],
            [
                'name' => 'Paypal',
                'code' => 'USD',
                'exchange_rate' => 1.00,
                'cur_sym' => '$',
                'sell_at' => 99.00,
                'buy_at' => 97.00,
                'fixed_charge_for_sell' => 2.50,
                'percent_charge_for_sell' => 1.8,
                'fixed_charge_for_buy' => 1.75,
                'percent_charge_for_buy' => 1.2,
                'reserve' => 0,
                'minimum_limit_for_sell' => 15.00,
                'maximum_limit_for_sell' => 400.00,
                'minimum_limit_for_buy' => 25.00,
                'maximum_limit_for_buy' => 700.00,
                'instruction' => 'Transaction fees apply.',
                'image' => 'currencies/paypal.png',
                'available_for_sell' => true,
                'available_for_buy' => true,
                'show_rate' => true,
            ],
            // Add more currencies as needed
        ];

        foreach ($currencies as $currency) {
            Currency::firstOrCreate(
                ['code' => $currency['code']], // Prevent duplicates using unique field
                $currency
            );
        }
    }
}