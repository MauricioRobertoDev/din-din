<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentType::factory()->create(['user_id' => null, 'name' => 'Pix']);
        PaymentType::factory()->create(['user_id' => null, 'name' => 'Transferência Bancária']);
        PaymentType::factory()->create(['user_id' => null, 'name' => 'Dinheiro']);
    }
}
