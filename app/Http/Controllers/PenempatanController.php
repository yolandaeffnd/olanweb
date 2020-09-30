<?php

namespace App\Http\Controllers;

use App\Penempatan;
use App\PembelajaranPeriode;
use App\Periode2;
use App\Halaqah;
use App\HalaqahSantri;
use App\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PenempatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas= \App\Penempatan::all();
        return view('penempatan2.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halaqah= Haalqah::orderBy('kode_halaqah','asc')->get();
        $pperiode= Hari::orderBy('kode_pembelajaran_periode','asc')->get();
        $data = \App\Penempatan::all();    
       return view('penempatan2/create',compact('halaqah','pperiode','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = halaqah::create([
    
        'kode_halaqah' => $request->get('kode_halaqah'),
        'jeniskelas' => $request->get('jeniskelas'),
        'id_pegawai' => $request->get('id_pegawai'),
        'id_tempat' => $request->get('id_tempat'),
       'id_periode' => $request->get('id_periode'),
        'id_jadwal' => $request->get('id_jadwal'),
        'jk' => $request->get('jk'),
         
       
        
        ]);


        return redirect('/halaqah')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Penempatan::find($id);
        return view('penempatan2/detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Penempatan::find($id);
        return view('penempatan2/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
           $data = \App\Penempatan::find($id);
     // $data->id_periode = $request->input('id_periode');
     //  $data->id_jadwal = $request->input('id_jadwal');
     //   $data->id_santri = $request->input('id_santri');
         $data->id_halaqah = $request->input('id_halaqah');
         $data->id_pembelajaran_periode = $request->input('id_pembelajaran_periode');
         // $data->tgl_regis = $request->input('tgl_regis');
         $data->tgl_mulai = $request->input('tgl_mulai');
           if( $request->input('tgl_mulai')!=null)
            {
                 $data->status ='ditempatkan';
                 
                   $data2 = HalaqahSantri::create([
    
                    'id_santri' => $data->id_santri,
                    'id_halaqah' => $data->id_halaqah,
                
                    ]);
            }
            else{

                 $data->status ='menunggu';   
            }
                     
        $data->update();
        $data2->save();

         $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_riwayat);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'id_halaqah'=>$data->id_halaqah,
                         ]);
                    
              
                $detail3->save();
            }

        
         return redirect()->route('penempatan2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Penempatan::find($id);
        $data->delete();
         return redirect()->route('penempatan2.index')->with('success', 'Data berhasil dihapus!');
    }
}
