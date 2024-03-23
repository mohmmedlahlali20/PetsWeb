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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price')->nullable()->default(00.0);
            $table->text('description')->nullable(); 
            $table->integer('quantity')->default(10);
            $table->string('image')->nullable();
            // $table->foreignId('category_id')
            // ->default(1)    
            // ->constrained('categories')
            // ->onDelete('cascade');
            // $table->foreignId('user_id')
            // ->constrained('users')
            // ->onDelete('cascade');  
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
