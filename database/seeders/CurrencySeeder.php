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
            ['name' => 'Payoneer', 'code' => 'USD', 'exchange_rate' => 1.00],
            ['name' => 'Paypal', 'code' => 'USD', 'exchange_rate' => 1.00],
            ['name' => 'Wise', 'code' => 'EUR', 'exchange_rate' => 0.85],
            ['name' => 'GBP', 'code' => 'GBP', 'exchange_rate' => 0.75],
            ['name' => 'Tether', 'code' => 'USDT', 'exchange_rate' => 1.00],
            ['name' => 'Bangladeshi Taka', 'code' => 'TK', 'exchange_rate' => 85.00],
        ];

        foreach ($currencies as $currency) {
            Currency::firstOrCreate(
                ['code' => $currency['code']], // Unique field to prevent duplicates
                ['name' => $currency['name'], 'exchange_rate' => $currency['exchange_rate']]
            );
        }
    }
}
