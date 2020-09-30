<?php

namespace App\Http\Controllers;

use App\Periode;
use Illuminate\Http\Request;

use DB;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $datas= Periode::orderBy('id_bulan_periode','asc')->get();
        return view('periode.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Periode::create([
    
        'semester' => $request->get('semester'),
        'bulan' => $request->get('bulan'),
        
        ]);
        return redirect('/periode')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Periode::find($id);
        return view('periode/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = \App\Periode::find($id);

        $data->semester = $request->input('semester');
        $data->bulan = $request->input('bulan');
   
        $data->update();
         return redirect()->route('periode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Periode::find($id);
        $data->delete();
         return redirect()->route('periode.index')->with('success', 'Data berhasil dihapus!');
    }
}
