<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')){
            $user = User::where('nama', 'LIKE', '%' .$request->search.'%')->simplePaginate(10);
        }else{
            $user = User::simplePaginate(10);
        }
        return view('user.index',[
            'user' => $user
        ]);
    }

    /* public function cetak()
    {   $tabel = user::all();
        return view('user.cetak',[
            'user' => $user
        ]);
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $user = User::all();
        return view('user.create', [
            'user' => $user,
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
        $user = $request->all();
        $perulanganInput = count($user["name"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            User::create([
                'name' => $user["name"][$i],
                'email' => $user["email"][$i],
                'password' => $user["password"][$i],
                'role' => $user["role"][$i],
            ]);
        }

        return redirect()->route('user.index')->with('toast_success', 'Data Telah ditambahkan');
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
    public function edit(User $user)
    {
        return view('user.edit', [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $user->update($data);

        //dd($data);

        return redirect()->route('user.index')->with('success', 'Data telah berubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('toast_success', 'Data telah berubah');
    }
}
