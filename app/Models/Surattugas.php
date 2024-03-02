<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattugas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'tgltugas', 'tglpelaksana', 'tujuan','deskripsi','id_staf','tglmulai','tglselesai','status', 'nosurat'
    ];

    public function staf()
    {
        return $this->belongsTo(Staf::class, 'id_staf', 'id');
    }
}
