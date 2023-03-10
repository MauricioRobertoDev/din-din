<?php

declare(strict_types=1);

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable()->index();
            $table->double('amount', 13, 2)->nullable();
            $table->timestamp('date')->nullable();
            $table->boolean('pending')->default(false);
            $table->enum('type', [Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE]);
            $table->foreignIdFor(Account::class);
            $table->foreignIdFor(Category::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
