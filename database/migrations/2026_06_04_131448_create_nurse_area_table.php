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
        Schema::create('nurse_area', function (Blueprint $table) {
            $table->id();

            $table->foreignId('nurse_id')
                ->constrained('nurses')
                ->cascadeOnDelete();

            $table->foreignId('area_id')
                ->constrained('arealocations')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurse_area');
    }
};
