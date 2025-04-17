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
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('users')->onDelete('cascade')->name('periksa_pasien');
            $table->foreignId('id_dokter')->constrained('users')->onDelete('cascade')->name('periksa_dokter');
            $table->date('tgl_periksa');
            $table->text('catatan')->nullable();
            $table->decimal('biaya_periksa', 10, 2);
            $table->enum('status', ['menunggu', 'selesai'])->default('menunggu');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_pasien')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksas');
    }
};
