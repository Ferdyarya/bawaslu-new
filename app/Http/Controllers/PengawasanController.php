<?php

namespace App\Http\Controllers;

use App\Models\Pengawasan;
use App\Models\Petugas_lapangan;
use Illuminate\Http\Request;

class PengawasanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $pengawasan = Pengawasan::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $pengawasan = Pengawasan::simplePaginate(10);
        }
        return view('pengawasan.index',[
            'pengawasan' => $pengawasan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $petugas = Petugas_lapangan::all();
       $pengawasan = Pengawasan::all();
        return view('pengawasan.create', [
            'pengawasan' => $pengawasan,
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
        $pengawasan = $request->all();
        $perulanganInput = count($pengawasan["tgltugas"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            pengawasan::create([
                'nosurat' => date('is'). '/' . 'LP'. '/' . '13' . '/' . date('Y'),
                'tgltugas' => $pengawasan["tgltugas"][$i],
                'tglpelaksana' => $pengawasan["tglpelaksana"][$i],
                'tujuan' => $pengawasan["tujuan"][$i],
                'penempatan' => $pengawasan["penempatan"][$i],
                'id_petugas' => $pengawasan["id_petugas"][$i],
            ]);
        }

        return redirect()->route('pengawasan.index')->with('toast_success', 'Data Telah ditambahkan');
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
    public function edit(Pengawasan $pengawasan)
    {
      $petugas = Petugas_lapangan::all();
       return view('pengawasan.edit', [
           'item' => $pengawasan,
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

    public function update(Request $request, Pengawasan $pengawasan)
    {
        $data = $request->all();

        $pengawasan->update($data);

        //dd($data);

        return redirect()->route('pengawasan.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengawasan $pengawasan)
    {
        $pengawasan->delete();
        return redirect()->route('pengawasan.index')->with('toast_success', 'Data telah Dihapus');
    }

}
