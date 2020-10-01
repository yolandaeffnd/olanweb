<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Agenda::orderBy('id_agenda','asc')->get();
        return view('agenda.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Agenda::create([
    
        'judul' => $request->get('judul'),
        'tgl' => $request->get('tgl'),
        'deskripsi' => $request->get('deskripsi'),
        
        
        ]);
        return redirect('/agenda')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Agenda::find($id);
        return view('agenda/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Agenda::find($id);

        $data->judul = $request->input('judul');
        $data->tgl = $request->input('tgl');
        $data->deskripsi = $request->input('deskripsi');
             
   
        $data->update();
         return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Agenda::find($id);
        $data->delete();
        return redirect()->route('agenda.index')->with('success', 'Data berhasil dihapus!');
    }
}
