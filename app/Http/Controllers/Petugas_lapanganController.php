<?php

namespace App\Http\Controllers;


use App\Models\Petugas_lapangan;
use Illuminate\Http\Request;

class Petugas_lapanganController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $datapetugas = Petugas_lapangan::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $datapetugas = Petugas_lapangan::simplePaginate(10);
        }
        return view('petugas.index',[
            'datapetugas' => $datapetugas
        ]);
    }

    /* public function cetak()
    {   $tabel = Petugas_lapangan::all();
        return view('staf.cetak',[
            'staf' => $datapetugas
        ]);
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $datapetugas = Petugas_lapangan::all();
        return view('petugas.create', [
            'datapetugas' => $datapetugas,
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
        $datapetugas = $request->all();
        $perulanganInput = count($datapetugas["nama"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            Petugas_lapangan::create([
                'nama' => $datapetugas["nama"][$i],
                'jabatan' => $datapetugas["jabatan"][$i],
                'email' => $datapetugas["email"][$i]
            ]);
        }

        return redirect()->route('petugas.index')->with('toast_success', 'Data Telah ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas_lapangan $petuga)
    {
        return view('petugas.edit', [
            'item' => $petuga
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Petugas_lapangan $petuga)
    {
        $data = $request->all();

        $petuga->update($data);

        //dd($data);

        return redirect()->route('petugas.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas_lapangan $petuga)
    {
        $petuga->delete();
        return redirect()->route('petugas.index')->with('toast_success', 'Data telah berubah');
    }
}
