<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Superadmin', 'description' => 'Full access to all features and settings'],
            ['name' => 'Admin', 'description' => 'Access to most features with administrative privileges'],
            ['name' => 'Editor', 'description' => 'Can edit content but with limited admin access'],
            ['name' => 'Viewer', 'description' => 'Read-only access with no editing permissions'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], ['description' => $role['description']]);
        }
    }
}
