<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the UserTypeSeeder and RoleSeeder to seed the user types and roles
        $this->call([
            UserTypeSeeder::class,
            RoleSeeder::class,
            CurrencySeeder::class,
        ]);

        // Create the first user as Superadmin with user type Admin
        $superAdminRole = Role::where('name', 'Superadmin')->first();
        $adminUserType = UserType::where('name', 'Admin')->first();

        // Ensure the user type and role exist before creating the user
        if ($superAdminRole && $adminUserType) {
            User::firstOrCreate(
                ['email' => 'superadmin@example.com'], // Replace with desired email
                [
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'username' => 'superadmin',
                    'phone_number' => '01735725560',
                    'password' => Hash::make('password'), // Replace with secure password
                    'user_type_id' => $adminUserType->id,
                    'role_id' => $superAdminRole->id,
                    'active_status' => true,
                    'can_login' => true,
                ]
            );
        }
    }
}
