<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
{
    Schema::create('pengajuan_pkls', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('industri_id')->constrained()->onDelete('cascade');
        $table->string('surat_pengantar');
        $table->string('cv');
        $table->string('transkrip_nilai')->nullable();
        $table->text('motivasi');
        $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
        $table->text('catatan_admin')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pkls');
    }
};
