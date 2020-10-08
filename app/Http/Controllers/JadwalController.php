<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Hari;
use App\Shift;


class JadwalController extends Controller
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
         $datas= \App\Jadwal::all();
        return view('jadwal.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shift= Shift::orderBy('kode_shift','asc')->get();
        $hari= Hari::orderBy('nama_hari','asc')->get();
        $data = \App\Jadwal::all();    
       return view('jadwal/create',compact('shift','hari','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data = jadwal::create([
    
        'kode_jadwal' => $request->get('kode_jadwal'),
        'nama_jadwal' => $request->get('nama_jadwal'),
        'id_hari' => $request->get('id_hari'),
        'id_shift' => $request->get('id_shift'),
       
        
        ]);
        return redirect('/jadwal')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data = \App\Jadwal::find($id);
        return view('jadwal/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = \App\Jadwal::find($id);

        $data->kode_jadwal = $request->input('kode_jadwal');
        $data->nama_jadwal = $request->input('nama_jadwal');
         $data->id_hari = $request->input('id_hari');
          $data->id_shift = $request->input('id_shift');
           

   
        $data->update();
         return redirect()->route('jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Jadwal::find($id);
        $data->delete();
         return redirect()->route('jadwal.index')->with('success', 'Data berhasil dihapus!');
    }
}
