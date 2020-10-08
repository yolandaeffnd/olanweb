<?php

namespace App\Http\Controllers;

use App\HalaqahSantri;
use App\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HalaqahSantriController extends Controller
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
         $datas= \App\HalaqahSantri::all();
        return view('halaqahsantri.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $santri= Santri::orderBy('id_santri','asc')->get();
        $halaqah= Halaqah::orderBy('id_halaqah','asc')->get();
        
        $data = \App\HalaqahSantri::all();    
       return view('halaqahsantri/create',compact('santri','halaqah','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HalaqahSantri  $halaqahSantri
     * @return \Illuminate\Http\Response
     */
    public function show(HalaqahSantri $halaqahSantri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HalaqahSantri  $halaqahSantri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = \App\HalaqahSantri::find($id);
        return view('halaqahsantri/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HalaqahSantri  $halaqahSantri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = \App\HalaqahSantri::find($id);

        
        $data->id_santri = $request->input('id_santri');
        $data->id_halaqah = $request->input('id_halaqah');
            
   
        $data->update();

         $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_riwayat);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'id_halaqah'=>$data->id_halaqah,
                         ]);
                    
              
                $detail3->save();
            }


         return redirect()->route('halaqahsantri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HalaqahSantri  $halaqahSantri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\HalaqahSantri::find($id);
        $data->delete();
         return redirect()->route('halaqahsantri.index')->with('success', 'Data berhasil dihapus!');
    }
}
