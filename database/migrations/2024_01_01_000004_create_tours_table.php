<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('title');                        // Pacitan Explorer: Klayar, Goa Gong & Banyu Tibo
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('duration_days');               // 3 hari
            $table->integer('max_people');                  // 15 maks
            $table->decimal('price', 12, 2);                // 1.250.000
            $table->decimal('rating', 3, 1)->default(0);    // 4.9
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};