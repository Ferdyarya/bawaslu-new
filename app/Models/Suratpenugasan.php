<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratpenugasan extends Model
{
  use HasFactory;
  protected $guarded = [];
  protected $fillable = [
      'tgltugas', 'tglpelaksana', 'tujuan','deskripsi','id_petugas','tglmulai','tglselesai','status', 'nosurat'
  ];

  public function petugas_lapangan()
  {
      return $this->belongsTo(Petugas_lapangan::class, 'id_petugas', 'id');
  }
}
