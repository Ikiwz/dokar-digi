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
        Schema::create('dokumen_mutu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->string('jenis_dokumen');
            $table->year('tahun');
            $table->string('revisi')->nullable();
            $table->date('masa_berlaku')->nullable();
            $table->string('file_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_mutus');
    }
};
