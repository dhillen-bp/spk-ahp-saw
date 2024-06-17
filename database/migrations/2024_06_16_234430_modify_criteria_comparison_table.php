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
        Schema::table('criteria_comparison', function (Blueprint $table) {
            $table->unsignedBigInteger('criteria_selected_id')->after('id');
            $table->foreign('criteria_selected_id')->references('id')->on('criteria_selected')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('criteria_comparison', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['criteria_selected_id']);

            // Hapus kolom
            $table->dropColumn('criteria_selected_id');
        });
    }
};
