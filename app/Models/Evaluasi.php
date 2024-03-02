<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
  use HasFactory;
  protected $fillable = [
      'id_laporan', 'performa','deskripsi','id_petugas','penilaian'
  ];
  public function penerimaan()
  {
      return $this->belongsTo(Penerimaan::class, 'id_laporan', 'id');
  }
  public function petugas_lapangan()
  {
      return $this->belongsTo(Petugas_lapangan::class, 'id_petugas', 'id');
  }
}
