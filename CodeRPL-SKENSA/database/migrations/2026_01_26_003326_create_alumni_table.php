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
            $table->string('whatsapp')->nullable();
            $table->string('foto')->nullable();
            $table->year('tahun_lulus');
            $table->string('tempat_pkl')->nullable();
            $table->text('deskripsi_pkl')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('jabatan')->nullable();
            $table->year('tahun_mulai_kerja')->nullable();
            $table->text('deskripsi_kerja')->nullable();
            $table->string('pendidikan_lanjutan')->nullable();
            $table->string('jurusan_kuliah')->nullable();
            $table->text('deskripsi_kuliah')->nullable();
            $table->text('testimoni')->nullable();
            $table->text('skills')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('status')->default('alumni');
            $table->json('pkl_lainnya')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('predikat_kelulusan')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('tahun_lulus');
            $table->index('nama');
            $table->index('email');
            $table->index('status');
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