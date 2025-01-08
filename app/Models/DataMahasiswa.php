<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'm_mahasiswa';
    protected $guarded = [];

    public function konsentrasi()
    {
        return $this->belongsTo(DataKonsentrasi::class, 'konsentrasi_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(DataJurusan::class, 'jurusan_id');
    }
}
