<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('account_id')->constrained('accounts');
            $table->foreignId('transfer_id')->constrained('transfers');
            $table->string('reference')->index('transfer_reference_index');
            $table->decimal('amount', 16, 4);
            $table->decimal('balance', 16, 4);
            $table->string('category'); //deposit or withdrawals
            $table->boolean('confirmed')->default(0);
            $table->string('description')->nullable();
            $table->dateTime('date');
            $table->text('metal')->nullable();
            $table->softDeletes();
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
