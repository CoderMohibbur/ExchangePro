<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = [
            ['name' => 'Admin', 'description' => 'Has access to all system features and settings'],
            ['name' => 'Reseller', 'description' => 'Can manage reselling functionalities'],
            ['name' => 'User', 'description' => 'Regular user with basic access'],
        ];

        foreach ($userTypes as $type) {
            UserType::firstOrCreate(['name' => $type['name']], ['description' => $type['description']]);
        }
    }
}
