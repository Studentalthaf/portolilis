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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('durasi'); // e.g., "3 Bulan", "Jan - Mar 2024"
            $table->text('deskripsi');
            $table->string('dokumentasi')->nullable(); // path to image/file
            $table->json('tech_stack')->nullable(); // array of technologies
            $table->string('status')->default('completed'); // completed, in_progress
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
