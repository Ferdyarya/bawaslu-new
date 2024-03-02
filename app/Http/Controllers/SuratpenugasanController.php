<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas_lapangan;
use App\Models\Suratpenugasan;

class SuratpenugasanController extends Controller
{
      public function index(Request $request)
      {
          if($request->has('search')){
              $suratpenugasan = Suratpenugasan::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
          }else{
              $suratpenugasan = Suratpenugasan::simplePaginate(10);
          }
          return view('suratpenugasan.index',[
              'suratpenugasan' => $suratpenugasan
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
         $suratpenugasan = Suratpenugasan::all();
          return view('suratpenugasan.create', [
              'suratpenugasan' => $suratpenugasan,
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
          $suratpenugasan = $request->all();
          $perulanganInput = count($suratpenugasan["tgltugas"]);

          for ($i=0; $i < $perulanganInput; $i++) {
              Suratpenugasan::create([
                  'nosurat' => date('is'). '/' . 'SP'. '/' . '11' . '/' . date('Y'),
                  'tgltugas' => $suratpenugasan["tgltugas"][$i],
                  'tglpelaksana' => $suratpenugasan["tglpelaksana"][$i],
                  'tujuan' => $suratpenugasan["tujuan"][$i],
                  'deskripsi' => $suratpenugasan["deskripsi"][$i],
                  'id_petugas' => $suratpenugasan["id_petugas"][$i],
                  'tglmulai' => $suratpenugasan["tglmulai"][$i],
                  'tglselesai' => $suratpenugasan["tglselesai"][$i],
                  'status' => $suratpenugasan["status"][$i],
              ]);
          }

          return redirect()->route('suratpenugasan.index')->with('toast_success', 'Data Telah ditambahkan');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show(Suratpenugasan $suratpenugasan)
      {
        $petugas = Petugas_lapangan::all();
         return view('suratpenugasan.pdf', [
             'item' => $suratpenugasan,
             'petugas' => $petugas
         ]);
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit(Suratpenugasan $suratpenugasan)
      {
        $petugas = Petugas_lapangan::all();
         return view('suratpenugasan.edit', [
             'item' => $suratpenugasan,
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

      public function update(Request $request, Suratpenugasan $suratpenugasan)
      {
          $data = $request->all();

          $suratpenugasan->update($data);

          //dd($data);

          return redirect()->route('suratpenugasan.index')->with('success', 'Data telah berubah');

      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy(Suratpenugasan $suratpenugasan)
      {
          $suratpenugasan->delete();
          return redirect()->route('suratpenugasan.index')->with('toast_success', 'Data telah berubah');
      }
      }
