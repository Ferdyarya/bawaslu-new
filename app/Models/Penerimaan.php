<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
  use HasFactory;
  protected $fillable = [
      'nosurat', 'tgltugas','tglkembali','id_petugas','deskripsi','total_anggaran','status'
  ];
  public function petugas_lapangan()
  {
      return $this->belongsTo(Petugas_lapangan::class, 'id_petugas', 'id');
  }
}
