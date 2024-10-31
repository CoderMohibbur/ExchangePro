<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'code' => strtoupper($this->faker->unique()->lexify('???')),
            'exchange_rate' => $this->faker->randomFloat(4, 0.5, 1.5),
        ];
    }
}
