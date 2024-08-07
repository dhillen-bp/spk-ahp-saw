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
        Schema::create('subcriteria_comparison', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('sub_criteria1_id');
            $table->foreign('sub_criteria1_id')->references('id')->on('sub_criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('sub_criteria2_id');
            $table->foreign('sub_criteria2_id')->references('id')->on('sub_criteria')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('nilai_sub_criteria1', 8, 3);
            $table->decimal('nilai_sub_criteria2', 8, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcriteria_comparison');
    }
};
