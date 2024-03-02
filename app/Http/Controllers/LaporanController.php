<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staf;
use App\Models\Surattugas;
use App\Models\Petugas_lapangan;
use App\Models\Penerimaan;
use App\Models\Evaluasi;
use App\Models\Suratpenugasan;

class LaporanController extends Controller
{
    //surat tugas
    public function lpSuratTugas()
    {
        $laporan = Surattugas::simplePaginate(10); // Mengambil semua data Surattugas dari database
        return view('laporan.lp-surattugas', ['laporan' => $laporan]);
    }

    public function getData(Request $request)
{
    $startDate = $request->input('dari');
    $endDate = $request->input('sampai');

    // Lakukan pengolahan data sesuai dengan rentang tanggal yang diterima
    $laporan = Surattugas::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->simplePaginate(10);

    session(['laporan' => $laporan]);
    // Kembalikan data dalam bentuk yang sesuai (misalnya, dalam bentuk view)
    return view('laporan.lp-surattugas', compact('laporan'));

}

public function CtkSt(Request $request)
{
   
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');

    $laporan = session('laporan');

    // Mengirimkan data ke view cetak-st
    return view('laporan.cetak.cetak-st', compact('laporan', 'dari', 'sampai'));
}

////
    //surat penugasan
    public function lpSuratPenugasan()
    {
        $penugasan = Suratpenugasan::simplePaginate(10); // Mengambil semua data Surattugas dari database
        return view('laporan.lp-suratpenugasan', ['penugasan' => $penugasan]);
    }

    public function getSp(Request $request)
{
    $startDate = $request->input('dari');
    $endDate = $request->input('sampai');

    // Lakukan pengolahan data sesuai dengan rentang tanggal yang diterima
    $penugasan = Suratpenugasan::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->simplePaginate(10);

    session(['penugasan' => $penugasan]);
    // Kembalikan data dalam bentuk yang sesuai (misalnya, dalam bentuk view)
    return view('laporan.lp-suratpenugasan', compact('penugasan'));

}

public function CtkSp(Request $request)
{
   
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');
    
    $penugasan = session('penugasan');

    // Mengirimkan data ke view cetak-sp
    return view('laporan.cetak.cetak-sp', compact('penugasan', 'dari', 'sampai'));
}

////        
    //penerimaan
    public function lpPenerimaan()
    {
        $penerimaan = Penerimaan::simplePaginate(10); // Mengambil semua data Surattugas dari database
        return view('laporan.lp-penerimaan', ['penerimaan' => $penerimaan]);
    }

    public function getPn(Request $request)
{
    $startDate = $request->input('dari');
    $endDate = $request->input('sampai');

    // Lakukan pengolahan data sesuai dengan rentang tanggal yang diterima
    $penerimaan = Penerimaan::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->simplePaginate(10);

    session(['penerimaan' => $penerimaan]);
    // Kembalikan data dalam bentuk yang sesuai (misalnya, dalam bentuk view)
    return view('laporan.lp-penerimaan', compact('penerimaan'));

}

public function CtkPn(Request $request)
{
   
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');
    
    $penerimaan = session('penerimaan');

    // Mengirimkan data ke view cetak-sp
    return view('laporan.cetak.cetak-pn', compact('penerimaan', 'dari', 'sampai'));
}

////
            //evaluasi
    public function lpEvaluasi()
    {
        $evaluasi = Evaluasi::simplePaginate(10); // Mengambil semua data Surattugas dari database
        return view('laporan.lp-evaluasi', ['evaluasi' => $evaluasi]);
    }

    public function getEv(Request $request)
{
    try {
        $startDate = $request->input('dari');
        $endDate = $request->input('sampai');

        // Lakukan pengolahan data sesuai dengan rentang tanggal yang diterima
        $evaluasi = Evaluasi::whereDate('created_at', '>=', $startDate)
                            ->whereDate('created_at', '<=', $endDate)
                            ->simplePaginate(10);

        session(['evaluasi' => $evaluasi]);
        
        // Kembalikan data dalam bentuk yang sesuai (misalnya, dalam bentuk view)
        return view('laporan.lp-evaluasi', compact('evaluasi'));
    } catch (\Exception $e) {
        \Log::error('Error occurred while fetching evaluation data: ' . $e->getMessage());
        return back()->with('errors', $e->messages()->all()[0])->withInput();
    }

}

public function CtkEv(Request $request)
{
   
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');
    
    $evaluasi = session('evaluasi');

    // Mengirimkan data ke view cetak-sp
    return view('laporan.cetak.cetak-ev', compact('evaluasi', 'dari', 'sampai'));
}

////
        //performa
    public function lpPerforma()
    {
        $performa = Evaluasi::simplePaginate(10); // Mengambil semua data Surattugas dari database
        return view('laporan.lp-performa', ['performa' => $performa]);
    }

    public function getPe(Request $request)
{
    $startDate = $request->input('dari');
    $endDate = $request->input('sampai');

    // Lakukan pengolahan data sesuai dengan rentang tanggal yang diterima
    $performa = Evaluasi::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->simplePaginate(10);

    session(['performa' => $performa]);
    // Kembalikan data dalam bentuk yang sesuai (misalnya, dalam bentuk view)
    return view('laporan.lp-performa', compact('performa'));

}
public function CtkPe(Request $request)
{
   
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');
    
    $performa = session('performa');

    // Mengirimkan data ke view cetak-sp
    return view('laporan.cetak.cetak-pe', compact('performa', 'dari', 'sampai'));
}

}
