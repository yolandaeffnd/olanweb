<?php

namespace App\Http\Controllers;

use App\Hari;
use Illuminate\Http\Request;
use DB;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas= Hari::orderBy('id_hari','asc')->get();
        return view('hari.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('hari.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Hari::create([
    
        'kode_hari' => $request->get('kode_hari'),
        'nama_hari' => $request->get('nama_hari'),
        
        ]);
        return redirect('/hari')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function show(Hari $hari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = \App\Hari::find($id);
        return view('hari/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Hari::find($id);

        $data->kode_hari = $request->input('kode_hari');
        $data->nama_hari = $request->input('nama_hari');
   
        $data->update();
         return redirect()->route('hari.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Hari::find($id);
        $data->delete();
         return redirect()->route('hari.index')->with('success', 'Data berhasil dihapus!');
    }
}
