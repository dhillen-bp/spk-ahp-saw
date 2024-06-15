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
        Schema::create('alternative_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->unsignedBigInteger('criteria_id');
            $table->decimal('nilai');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('criteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternative_values');
    }
};
