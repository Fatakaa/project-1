<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFakultas extends Model
{
    use HasFactory;

    protected $table = 'm_fakultas';
    protected $guarded = [];
    public function jurusan()
    {
        return $this->hasMany(DataJurusan::class, 'fakultas_id');
    }
}
