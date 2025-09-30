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
        Schema::create('kepribadian_jawaban', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger('soal_id');
              $table->string('jawaban_text');
              $table->integer('bobot');
              $table->timestamps();

              $table->foreign('soal_id')->references('id')->on('kepribadian_soals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepribadian_jawaban');
    }
};
