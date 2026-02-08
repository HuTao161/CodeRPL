<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumnis', function (Blueprint $table) {
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
            
            // KOLOM BARU UNTUK FITUR LENGKAP
            $table->string('angkatan')->nullable(); // Angkatan/masuk sekolah
            $table->string('durasi_pkl')->nullable(); // Contoh: "3 bulan"
            $table->string('bidang_pkl')->nullable(); // Contoh: "Web Development"
            $table->string('bidang_kerja')->nullable(); // Contoh: "IT", "Marketing"
            $table->year('tahun_mulai_kerja')->nullable(); // Tahun mulai bekerja
            $table->enum('status_kerja', ['Bekerja', 'Kuliah', 'Wirausaha', 'Lainnya'])
                  ->default('Lainnya'); // Status saat ini
            $table->string('linkedin')->nullable(); // URL LinkedIn
            $table->string('instagram')->nullable(); // OPTIONAL: Username Instagram
            $table->string('github')->nullable(); // OPTIONAL: URL GitHub
            $table->string('portfolio')->nullable(); // OPTIONAL: URL portfolio
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};