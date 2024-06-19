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
        Schema::create('criteria_comparison', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria1_id');
            $table->foreign('kriteria1_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('kriteria2_id');
            $table->foreign('kriteria2_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('nilai_kriteria1', 8, 3);
            $table->decimal('nilai_kriteria2', 8, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria_comparison');
    }
};
