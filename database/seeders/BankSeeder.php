<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample bank data
        $banks = [
            [
                'name' => 'Bank A',
                'beneficiary_name' => 'John Doe',
                'account_number' => '1234567890',
                'account_type' => 'Checking',
                'routing' => '011000015',
                'bank_address' => '123 Bank Street, Cityville',
                'npsb_fee' => 10,
                'eft_beftn_fee' => 2.50,
                'balance' => 0,
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bank B',
                'beneficiary_name' => 'Jane Smith',
                'account_number' => '0987654321',
                'account_type' => 'Savings',
                'routing' => '022000046',
                'bank_address' => '456 Money Avenue, Townsville',
                'npsb_fee' => 10,
                'eft_beftn_fee' => 1.75,
                'balance' => 0,
                'logo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more bank entries as needed
        ];

        // Insert the sample bank data into the banks table
        DB::table('banks')->insert($banks);
    }
}
