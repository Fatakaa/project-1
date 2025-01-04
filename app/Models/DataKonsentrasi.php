<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKonsentrasi extends Model
{
    use HasFactory;

    protected $table = 'm_konsentrasi';
    protected $guarded = [];
    public function mahasiswa()
    {
        return $this->hasMany(DataMahasiswa::class, 'konsentrasi_id');
    }
}
