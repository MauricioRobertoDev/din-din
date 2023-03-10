<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'amount' => fake()->numberBetween(0, 100),
            'date' => fake()->dateTime(),
            'pending' => fake()->boolean(),
            'type' => fake()->randomElement([Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE]),
            'account_id' => Account::factory()->create(),
            'category_id' => Category::factory()->create(),
        ];
    }
}
