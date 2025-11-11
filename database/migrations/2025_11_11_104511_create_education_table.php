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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institusi'); // SD Negeri 01, SMP Negeri 02, etc.
            $table->string('tingkat'); // SD, SMP, SMA, Universitas
            $table->string('tahun_mulai'); // 2010
            $table->string('tahun_selesai'); // 2016
            $table->text('keterangan')->nullable(); // additional info
            $table->integer('urutan')->default(0); // untuk sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
