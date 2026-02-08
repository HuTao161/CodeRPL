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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->nullable();
            $table->string('email')->nullable();
            $table->string('kontak')->nullable();
            $table->string('foto')->nullable();
            $table->year('tahun_lulus');
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('jabatan')->nullable();
            $table->text('deskripsi_kerja')->nullable();
            $table->string('tempat_pkl')->nullable();
            $table->text('skills')->nullable();
            $table->text('testimoni')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};