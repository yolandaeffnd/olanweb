<?php

namespace App\Http\Controllers;

use App\Periode2;
use Illuminate\Http\Request;

class Periode2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $datas= Periode2::orderBy('id_periode','asc')->get();
        return view('periode2.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periode2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Periode2::create([
    
        'kode_periode' => $request->get('kode_periode'),
        'semester' => $request->get('semester'),
        'tahun_akademik' => $request->get('tahun_akademik'),
        'tahun' => $request->get('tahun'),
        'tgl_mulai' => $request->get('tgl_mulai'),
        'status' => $request->get('status'),
        
        ]);
        return redirect('/periode2')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periode2  $periode2
     * @return \Illuminate\Http\Response
     */
    public function show(Periode2 $periode2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periode2  $periode2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Periode2::find($id);
        return view('periode2/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periode2  $periode2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = \App\periode2::find($id);

        $data->kode_periode = $request->input('kode_periode');
        $data->semester = $request->input('semester');
         $data->tahun_akademik = $request->input('tahun_akademik');
          $data->tahun = $request->input('tahun');
           $data->tgl_mulai = $request->input('tgl_mulai');
            $data->status = $request->input('status');

   
        $data->update();
         return redirect()->route('periode2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periode2  $periode2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = \App\Periode2::find($id);
        $data->delete();
         return redirect()->route('periode2.index')->with('success', 'Data berhasil dihapus!');
    }
}
