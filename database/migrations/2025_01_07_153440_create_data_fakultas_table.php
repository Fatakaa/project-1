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
        Schema::create('m_fakultas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fakultas');
            $table->string('nama_fakultas_english');
            $table->string('nama_fakultas_singkatan');
            $table->string('alamat');
            $table->string('email');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_fakultas');
    }
};
