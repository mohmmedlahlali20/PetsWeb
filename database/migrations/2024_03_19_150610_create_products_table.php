<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            //$table->integer('quantity')->default(10);
            $table->string('image')->nullable();
            $table->foreignId('category_id')
            ->constrained('categories')
            ->onDelete('cascade'); 
            $table->integer('age');
            $table->enum('sex', ['male', 'female']);
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->onDelete('cascade');  
            //$table->bigInteger('likes')->default(0);
            $table->unsignedInteger('likes')->default(0);
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
