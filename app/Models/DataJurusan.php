<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJurusan extends Model
{
    use HasFactory;

    protected $table = 'm_jurusan';
    protected $guarded = [];
    public function fakultas()
    {
        return $this->belongsTo(DataFakultas::class, 'fakultas_id');
    }
    public function mahasiswa()
    {
        return $this->hasMany(DataMahasiswa::class, 'jurusan_id');
    }
}
