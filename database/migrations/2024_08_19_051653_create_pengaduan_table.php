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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('alternative_value_id'); // penilaian warga yang terkait
            $table->string('nik');
            $table->unsignedBigInteger('criteria_id'); // criteria yang terkait
            $table->string('old_value'); // Nilai lama yang salah
            $table->string('new_value'); // Nilai baru yang diajukan sebagai koreksi
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu'); // Status koreksi
            $table->text('deskripsi_aduan')->nullable();
            $table->text('keterangan_balasan')->nullable();
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('alternatives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('criteria_id')->references('id')->on('criteria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
