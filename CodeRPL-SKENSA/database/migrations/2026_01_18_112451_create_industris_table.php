<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('industris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_industri');
            $table->string('logo')->nullable();
            $table->enum('bidang', ['IT', 'Software House', 'Multimedia', 'Telekomunikasi', 'Startup', 'Lainnya']);
            $table->text('alamat');
            $table->string('kontak');
            $table->integer('kuota_pkl');
            $table->integer('kuota_terisi')->default(0);
            $table->text('deskripsi');
            $table->enum('status', ['tersedia', 'penuh'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('industris');
    }
};