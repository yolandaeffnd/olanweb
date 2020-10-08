<?php

namespace App\Http\Controllers;

use App\Tempat;
use Illuminate\Http\Request;

class TempatController extends Controller
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
        
        $datas= Tempat::orderBy('id_tempat','asc')->get();
        return view('tempat.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('tempat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Tempat::create([
         'kode_tempat' => $request->get('kode_tempat'),
        'gedung' => $request->get('gedung'),

        'ruangan' => $request->get('ruangan'),
        'tingkat' => $request->get('tingkat'),
        
        ]);
        return redirect('/tempat')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function show(Tempat $tempat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Tempat::find($id);
        return view('tempat/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = \App\Tempat::find($id);

        $data->kode_tempat = $request->input('kode_tempat');
        $data->gedung = $request->input('gedung');
        $data->ruangan = $request->input('ruangan');
        $data->tingkat = $request->input('tingkat');
   
        $data->update();
         return redirect()->route('tempat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Tempat::find($id);
        $data->delete();
         return redirect()->route('tempat.index')->with('success', 'Data berhasil dihapus!');
    }
}
