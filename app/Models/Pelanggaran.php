<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nosurat', 'tglsurat','tglkejadian','id_petugas','keterangan','kategori','status','pelaku'
    ];

    public function petugas_lapangan()
    {
        return $this->belongsTo(Petugas_lapangan::class, 'id_petugas', 'id');
    }
}
