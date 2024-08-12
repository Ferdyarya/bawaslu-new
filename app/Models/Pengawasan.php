<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengawasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nosurat', 'tgltugas','tglpelaksana','id_petugas','tujuan','penempatan'
    ];
    public function petugas_lapangan()
    {
        return $this->belongsTo(Petugas_lapangan::class, 'id_petugas', 'id');
    }
}
