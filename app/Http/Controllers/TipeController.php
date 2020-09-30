<?php

namespace App\Http\Controllers;

use App\Tipe;
use Illuminate\Http\Request;
use DB;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Tipe::orderBy('id_tipe','asc')->get();
        return view('tipe.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Tipe::create([
    
        'kode_tipe' => $request->get('kode_tipe'),
        'nama_tipe' => $request->get('nama_tipe'),
        
        ]);
        return redirect('/tipe')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function show(Tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = \App\Tipe::find($id);
        return view('tipe/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = \App\Tipe::find($id);

        $data->kode_tipe = $request->input('kode_tipe');
        $data->nama_tipe = $request->input('nama_tipe');
   
        $data->update();
         return redirect()->route('tipe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = \App\Tipe::find($id);
        $data->delete();
         return redirect()->route('tipe.index')->with('success', 'Data berhasil dihapus!');
    }
}
