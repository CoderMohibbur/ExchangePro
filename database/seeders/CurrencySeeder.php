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
            ['name' => 'Payoneer', 'code' => 'USD', 'exchange_rate' => 1.0000],
            ['name' => 'Wise', 'code' => 'EUR', 'exchange_rate' => 0.9200],
            ['name' => 'USDT', 'code' => 'USDT', 'exchange_rate' => 1.0000],
            ['name' => 'PayPal', 'code' => 'USD', 'exchange_rate' => 1.0000],
        ];

        foreach ($currencies as $currency) {
            Currency::updateOrCreate(['code' => $currency['code']], $currency);
        }
    }
}
