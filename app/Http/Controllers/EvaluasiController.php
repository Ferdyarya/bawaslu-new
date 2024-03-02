<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas_lapangan;
use App\Models\Penerimaan;
use App\Models\Evaluasi;

class EvaluasiController extends Controller
{
  public function index(Request $request)
  {
      if($request->has('search')){
          $evaluasi = Evaluasi::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
      }else{
          $evaluasi = Evaluasi::simplePaginate(10);
      }
      return view('evaluasi.index',[
          'evaluasi' => $evaluasi
      ]);
  }
  /* public function cetak()
  {   $tabel = Petugas_lapangan::all();
      return view('petugas_lapangan.cetak',[
          'petugas_lapangan' => $datapetugas_lapangan
      ]);
  } */

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
     $petugas = Petugas_lapangan::all();
     $evaluasi = Evaluasi::all();
     $laporan = Penerimaan::all();
      return view('evaluasi.create', [
          'evaluasi' => $evaluasi,
          'laporan' => $laporan,
          'petugas' => $petugas
      ]);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $evaluasi = $request->all();
      $perulanganInput = count($evaluasi["id_laporan"]);

      for ($i=0; $i < $perulanganInput; $i++) {
          Evaluasi::create([
              'id_laporan' => $evaluasi["id_laporan"][$i],
              'id_petugas' => $evaluasi["id_petugas"][$i],
              'performa' => $evaluasi["performa"][$i],
              'deskripsi' => $evaluasi["deskripsi"][$i],
              'penilaian' => $evaluasi["penilaian"][$i]
          ]);
      }

      return redirect()->route('evaluasi.index')->with('toast_success', 'Data Telah ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Evaluasi $evaluasi)
  {
    $petugas = Petugas_lapangan::all();
    $laporan = Penerimaan::all();
     return view('evaluasi.edit', [
         'item' => $evaluasi,
         'laporan' => $laporan,
         'petugas' => $petugas
     ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function update(Request $request, Evaluasi $evaluasi)
  {
      $data = $request->all();

      $evaluasi->update($data);

      //dd($data);

      return redirect()->route('evaluasi.index')->with('success', 'Data telah berubah');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Evaluasi $evaluasi)
  {
      $evaluasi->delete();
      return redirect()->route('evaluasi.index')->with('toast_success', 'Data telah berubah');
  }
  }
