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
        Schema::create('commends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')
            ->nullable()
            ->constrained('products')
            ->onDelete('cascade');
            $table->foreignId('food_id')
            ->nullable()
            ->constrained('food')
            ->onDelete('cascade');
            $table->foreignId('accessoir_id')
            ->nullable()
            ->constrained('accessoirs')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');
            $table->softDeletes();
            $table->enum('status', ['valide', 'invalid']); 
            $table->float('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commends');
    }
};
