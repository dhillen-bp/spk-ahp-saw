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
        Schema::table('criteria_selected', function (Blueprint $table) {
            $table->integer('jumlah_penerima')->after('nama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('criteria_selected', function (Blueprint $table) {
            $table->dropColumn('jumlah_penerima');
        });
    }
};
