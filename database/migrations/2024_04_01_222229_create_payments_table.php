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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->foreignId('commend_id')
                ->constrained('commends')
                ->onDelete('cascade');
            $table->enum('payment_status', ['valider', 'invalide'])->default('valider');
            $table->string('stripe_payment_id')->nullable(); // Champ pour stocker l'ID de paiement Stripe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
