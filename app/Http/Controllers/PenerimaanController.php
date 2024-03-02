<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas_lapangan;
use App\Models\Penerimaan;

class PenerimaanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $penerimaan = Penerimaan::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $penerimaan = Penerimaan::simplePaginate(10);
        }
        return view('penerimaan.index',[
            'penerimaan' => $penerimaan
        ]);
    }
    /* public function cetak()
    {   $tabel = Penerimaan::all();
        return view('penerimaan.cetak',[
            'penerimaan' => $penerimaan
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
       $penerimaan = Penerimaan::all();
        return view('penerimaan.create', [
            'penerimaan' => $penerimaan,
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
        $penerimaan = $request->all();
        $perulanganInput = count($penerimaan["tgltugas"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            Penerimaan::create([
                'nosurat' => date('is'). '/' . 'LP'. '/' . '13' . '/' . date('Y'),
                'tgltugas' => $penerimaan["tgltugas"][$i],
                'tglkembali' => $penerimaan["tglkembali"][$i],
                'total_anggaran' => $penerimaan["total_anggaran"][$i],
                'deskripsi' => $penerimaan["deskripsi"][$i],
                'id_petugas' => $penerimaan["id_petugas"][$i],
                'status' => $penerimaan["status"][$i],
            ]);
        }

        return redirect()->route('penerimaan.index')->with('toast_success', 'Data Telah ditambahkan');
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
    public function edit(Penerimaan $penerimaan)
    {
      $petugas = Petugas_lapangan::all();
       return view('penerimaan.edit', [
           'item' => $penerimaan,
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

    public function update(Request $request, Penerimaan $penerimaan)
    {
        $data = $request->all();

        $penerimaan->update($data);

        //dd($data);

        return redirect()->route('penerimaan.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();
        return redirect()->route('penerimaan.index')->with('toast_success', 'Data telah berubah');
    }
    }
