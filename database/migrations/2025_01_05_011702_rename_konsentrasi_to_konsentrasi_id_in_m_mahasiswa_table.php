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
        Schema::table('m_mahasiswa', function (Blueprint $table) {
            // Mengubah nama kolom 'konsentrasi' menjadi 'konsentrasi_id'
            $table->renameColumn('konsentrasi', 'konsentrasi_id');
    
            // Mengubah tipe data kolom 'konsentrasi_id' menjadi 'bigint unsigned'
            $table->bigInteger('konsentrasi_id')->unsigned()->change();
    
            // Menambahkan foreign key constraint
            $table->foreign('konsentrasi_id')->references('id')->on('m_konsentrasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_mahasiswa', function (Blueprint $table) {
            //
        });
    }
};
