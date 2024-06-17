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
        Schema::create('criteria_priority_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criteria_selected_id');
            $table->unsignedBigInteger('criteria_id');
            $table->decimal('nilai');
            $table->timestamps();

            $table->foreign('criteria_selected_id')->references('id')->on('criteria_selected')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('criteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria_priority_values');
    }
};
