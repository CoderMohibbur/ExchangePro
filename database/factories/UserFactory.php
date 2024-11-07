<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserType;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the model that this factory is for.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'username' => fake()->userName(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'), // Default password
            'user_type_id' => UserType::inRandomOrder()->first()?->id ?? UserType::factory(), // Assumes UserType factory exists
            'role_id' => Role::inRandomOrder()->first()?->id ?? Role::factory(), // Assumes Role factory exists
            'active_status' => true,
            'access_status' => true,
            'random_code' => Str::random(10),
            'notificationToken' => Str::random(16),
            'language' => 'en',
            'rtl_ltl' => 'ltl',
            'selected_session' => null,
            'is_administrator' => false,
            'is_registered' => true,
            'device_token' => Str::random(20),
            'style_id' => null,
            'company_id' => null,
            'created_by' => null,
            'updated_by' => null,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
