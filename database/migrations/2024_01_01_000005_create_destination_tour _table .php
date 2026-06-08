<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Pivot table: satu tour bisa mencakup banyak destinasi (many-to-many)
// Contoh: "Pacitan Explorer" mencakup Klayar, Goa Gong, Banyu Tibo
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destination_tour', function (Blueprint $table) {
            $table->foreignId('tour_id')->constrained('tours')->cascadeOnDelete();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete();
            $table->primary(['tour_id', 'destination_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destination_tour');
    }
};