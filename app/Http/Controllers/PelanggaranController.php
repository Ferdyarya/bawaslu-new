<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Petugas_lapangan;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $pelanggaran = Pelanggaran::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $pelanggaran = Pelanggaran::simplePaginate(10);
        }
        return view('pelanggaran.index',[
            'pelanggaran' => $pelanggaran
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
       $pelanggaran = Pelanggaran::all();
        return view('pelanggaran.create', [
            'pelanggaran' => $pelanggaran,
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
        // $pelanggaran = $request->all();
        // $perulanganInput = count($pelanggaran["tglsurat"]);

        // for ($i=0; $i < $perulanganInput; $i++) {
            //     Pelanggaran::create([
                //         'nosurat' => date('is'). '/' . 'LP'. '/' . '13' . '/' . date('Y'),
                //         'tglsurat' => $pelanggaran["tglsurat"][$i],
                //         'tglkejadian' => $pelanggaran["tglkejadian"][$i],
                //         'keterangan' => $pelanggaran["keterangan"][$i],
                //         'kategori' => $pelanggaran["kategori"][$i],
                //         'pelaku' => $pelanggaran["pelaku"][$i],
                //         'id_petugas' => $pelanggaran["id_petugas"][$i],
                //         // 'status' => $pelanggaran["status"][$i],
                //     ]);
                // }

        // return($request->all());


        $pelanggaran = Pelanggaran::create([
            'nosurat' => date('is'). '/' . 'LP'. '/' . '13' . '/' . date('Y'),
            'tglsurat' => $request->tglsurat,
            'tglkejadian' => $request->tglkejadian,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'pelaku' => $request->pelaku,
            'id_petugas' => $request->id_petugas,
        ]);

        return redirect()->route('pelanggaran.index')->with('toast_success', 'Data Telah ditambahkan');
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
    public function edit(pelanggaran $pelanggaran)
    {
      $petugas = Petugas_lapangan::all();
       return view('pelanggaran.edit', [
           'item' => $pelanggaran,
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

    public function update(Request $request, Pelanggaran $pelanggaran)
    {
        $data = $request->all();

        $pelanggaran->update($data);

        //dd($data);

        return redirect()->route('pelanggaran.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggaran $pelanggaran)
    {
        $pelanggaran->delete();
        return redirect()->route('pelanggaran.index')->with('toast_success', 'Data telah Dihapus');
    }

    public function tindaklanjut_index(Request $request)
    {
        $query = Pelanggaran::query();

        // Filter pencarian
        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        $pelanggaran = $query->paginate(10);


        return view('tindaklanjut.index', compact('pelanggaran'));
    }

    public function updateStatus(Request $request, $id)
{
    // Ambil data item berdasarkan ID
    $item = Pelanggaran::findOrFail($id);

    // Validasi status: hanya izinkan update jika status saat ini bukan 'approve'
    if ($item->status === 'approve') {
        return redirect()->back()->withErrors(['status' => 'Data sudah disetujui dan tidak bisa diubah.']);
    }

    // Update status menjadi 'approve'
    $item->status = 'approve';
    $item->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}





}
