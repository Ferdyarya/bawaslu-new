<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use App\Models\Surattugas;
use Illuminate\Http\Request;

class SurattugasController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $surattugas = Surattugas::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $surattugas = Surattugas::simplePaginate(10);
        }
        return view('surattugas.index',[
            'surattugas' => $surattugas
        ]);
    }

    /* public function cetak()
    {   $tabel = Staf::all();
        return view('staf.cetak',[
            'staf' => $datastaf
        ]);
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $staf = Staf::all();
       $surattugas = Surattugas::all();
        return view('surattugas.create', [
            'surattugas' => $surattugas,
            'staf' => $staf
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
        $surattugas = $request->all();
        $perulanganInput = count($surattugas["tgltugas"]);

            for ($i=0; $i < $perulanganInput; $i++) {
                // Ubah array deskripsi menjadi string
                $deskripsi = is_array($surattugas["deskripsi"]) ? $surattugas["deskripsi"][$i] : $surattugas["deskripsi"];

                Surattugas::create([
                    'nosurat' => date('is'). '/' . 'ST'. '/' . '10' . '/' . date('Y'),
                    'tgltugas' => $surattugas["tgltugas"][$i],
                    'tglpelaksana' => $surattugas["tglpelaksana"][$i],
                    'tujuan' => $surattugas["tujuan"][$i],
                    'deskripsi' => $deskripsi,
                    'id_staf' => $surattugas["id_staf"][$i],
                    'tglmulai' => $surattugas["tglmulai"][$i],
                    'tglselesai' => $surattugas["tglselesai"][$i],
                    'status' => $surattugas["status"][$i],
                ]);
            }

            return redirect()->route('surattugas.index')->with('toast_success', 'Data Telah ditambahkan');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Surattugas $surattuga)
    {
        $staf = Staf::all();
        return view('surattugas.pdf', [
           'item' => $surattuga,
            'staf' => $staf
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Surattugas $surattuga)
    {
      $staf = Staf::all();
       return view('surattugas.edit', [
          'item' => $surattuga,
           'staf' => $staf
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Surattugas $surattuga)
    {
        $data = $request->all();

        $surattuga->update($data);

        //dd($data);

        return redirect()->route('surattugas.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surattugas $surattuga)
    {
        $surattuga->delete();
        return redirect()->route('surattugas.index')->with('toast_success', 'Data telah berubah');
    }
}
