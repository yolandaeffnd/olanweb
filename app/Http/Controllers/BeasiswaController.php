<?php

namespace App\Http\Controllers;

use App\Beasiswa;
use App\Santri;
use App\Periode2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= \App\Beasiswa::all();
        return view('beasiswa.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $santri= Santri::orderBy('id_santri','asc')->get();
          $periode2= Periode2::orderBy('kode_periode','asc')->get();  
             $data = \App\Beasiswa::all(); 
       return view('beasiswa/create',compact('shift','hari','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = beasiswa::create([
    
        'id_santri' => $request->get('id_santri'),
        'jumlah_pembayaran_spp' => $request->get('jumlah_pembayaran_spp'),
        'bulan_berlaku' => $request->get('bulan_berlaku'),
        'id_periode' => $request->get('id_periode'),
        'status_beasiswa' => $request->get('status_beasiswa'),
       
        
        ]);
        return redirect('/beasiswa')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Beasiswa $beasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $data = \App\Beasiswa::find($id);
        return view('beasiswa/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beasiswa $beasiswa)
    {
        $data = \App\Beasiswa::find($id);

        $data->id_santri = $request->input('id_santri');
        $data->jumlah_pembayaran_spp = $request->input('jumlah_pembayaran_spp');
         $data->bulan_berlaku = $request->input('bulan_berlaku');
          $data->id_periode = $request->input('id_periode');
        $data->status_beasiswa = $request->input('status_beasiswa');
                     

   
        $data->update();
         return redirect()->route('beasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = \App\Beasiswa::find($id);
        $data->delete();
         return redirect()->route('beasiswa.index')->with('success', 'Data berhasil dihapus!');
    }
}
