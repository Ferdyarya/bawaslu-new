<?php

namespace App\Http\Controllers;


use App\Models\Staf;
use Illuminate\Http\Request;

class StafController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $datastaf = Staf::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $datastaf = Staf::simplePaginate(10);
        }
        return view('staf.index',[
            'datastaf' => $datastaf
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
       $datastaf = Staf::all();
        return view('staf.create', [
            'datastaf' => $datastaf,
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
        $datastaf = $request->all();
        $perulanganInput = count($datastaf["nama"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            Staf::create([
                'nama' => $datastaf["nama"][$i],
                'jabatan' => $datastaf["jabatan"][$i],
                'instansi' => $datastaf["instansi"][$i],
                'dpt_bagian' => $datastaf["dpt_bagian"][$i],
            ]);
        }

        return redirect()->route('staf.index')->with('toast_success', 'Data Telah ditambahkan');
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
    public function edit(Staf $staf)
    {
        return view('staf.edit', [
            'item' => $staf
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Staf $staf)
    {
        $data = $request->all();

        $staf->update($data);

        //dd($data);

        return redirect()->route('staf.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(staf $staf)
    {
        $staf->delete();
        return redirect()->route('staf.index')->with('toast_success', 'Data telah berubah');
    }
}
