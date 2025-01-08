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
            $table->renameColumn('prodi', 'jurusan_id');
    
            // Mengubah tipe data kolom 'konsentrasi_id' menjadi 'bigint unsigned'
            $table->bigInteger('jurusan_id')->unsigned()->change();
    
            // Menambahkan foreign key constraint
            $table->foreign('jurusan_id')->references('id')->on('m_jurusan')->onDelete('cascade');
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
