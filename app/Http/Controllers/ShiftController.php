<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
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
        $datas= Shift::orderBy('id_shift','asc')->get();
        return view('shift.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shift.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Shift::create([
    
        'kode_shift' => $request->get('kode_shift'),
        'waktu' => $request->get('waktu'),
        'jam_mulai' => $request->get('jam_mulai'),
        'jam_selesai' => $request->get('jam_selesai'),
        
        
        ]);
        return redirect('/shift')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Shift::find($id);
        return view('shift/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $data = \App\Shift::find($id);

        $data->kode_shift = $request->input('kode_shift');
        $data->waktu = $request->input('waktu');
        $data->jam_mulai = $request->input('jam_mulai');
        $data->jam_selesai = $request->input('jam_selesai');
             
   
        $data->update();
         return redirect()->route('shift.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = \App\Shift::find($id);
        $data->delete();
         return redirect()->route('shift.index')->with('success', 'Data berhasil dihapus!');
    }
}
