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
        Schema::create('kepribadian_soals', function (Blueprint $table) {
              $table->id();
              $table->string('tipe'); // bigfive/mbti/mmpi
              $table->text('pertanyaan');
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepribadian_soals');
    }
};
