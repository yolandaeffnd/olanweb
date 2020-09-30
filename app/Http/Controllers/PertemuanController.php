<?php

namespace App\Http\Controllers;

use App\Pertemuan;
use App\Halaqah;
use App\PembelajaranPeriode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $datas= \App\Pertemuan::all();
        return view('pertemuan.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halaqah= Halaqah::orderBy('kode_pertemuan','asc')->get();
        $pembelajaranperiode= PembelajaranPeriode::orderBy('kode_pembelajaran_periode','asc')->get();
        $data = \App\Penempatan::all();    
       return view('pertemuan/create',compact('halaqah','pembelajaranperiode','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = Pertemuan::create([
    
        'id_halaqah' => $request->get('id_halaqah'),
        'tgl' => $request->get('tgl'),
        'id_pembelajaran_periode' => $request->get('id_pembelajaran_periode'),
        'id_pertemuan_kelas' =>0,
         ]);

         $data->save();
          
        
         $alldetail= Pertemuan::where('id_pertemuan',$data->id_pertemuan)->get();
         $count = Pertemuan::where('id_halaqah',$data->id_halaqah)->count();
             foreach($alldetail as $d){
                $detail=Pertemuan::find($d->id_pertemuan);

                if($count>1)
                {
                     $detail->where('id_pertemuan', $data->id_pertemuan)
                        ->update([
                            'id_pertemuan_kelas' => ($detail->id_pertemuan_kelas+$count),
                            ]);
                }
                else
                {
                    $detail->where('id_pertemuan', $data->id_pertemuan)
                        ->update([
                            'id_pertemuan_kelas' => ($detail->id_pertemuan_kelas+1),
                            ]);
                }
              
                $detail->save();
            }
          
        



       
        
       
        return redirect('/pertemuan')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertemuan $pertemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = \App\Pertemuan::find($id);
        return view('pertemuan/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Pertemuan::find($id);

        $data->id_halaqah = $request->input('id_halaqah');
        $data->tgl = $request->input('tgl');
         $data->id_pembelajaran_periode = $request->input('id_pembelajaran_periode');
          $data->id_pertemuan_kelas = $request->input('id_pertemuan_kelas');
        
        $data->update();
         return redirect()->route('pertemuan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertemuan  $pertemuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $data = \App\Pertemuan::find($id);
    $data->delete();
     return redirect()->route('pertemuan.index')->with('success', 'Data berhasil dihapus!');
    }
}
