<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Santri;
use App\Periode2;
use App\Periode;
use App\Riwayat;
use App\Beasiswa;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= \App\Pembayaran::all();
        return view('pembayaran.index', ['datas' => $datas]);
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
          $periode= Periode::orderBy('id_bulan_periode','asc')->get();  
          
          $data = \App\Pembayaran::all(); 
       return view('pembayaran/create',compact('santri','periode2','periode','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = pembayaran::create([
    
        'id_santri' => $request->get('id_santri'),
        'id_periode' => $request->get('id_periode'),
        'bulan' => $request->get('bulan'),
        'tgl_pembayaran' => $request->get('tgl_pembayaran'),
        'spp' => $request->get('spp'),
        'status' => $request->get('status'),
       
        
        ]);
          $data->save();

         $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_riwayat);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'bulan'=>$data->bulan,
                            'status_pembayaran'=>$data->status,
                         ]);
                    
              
                $detail3->save();
            }
           
              
              
        return redirect('/pembayaran')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         
    }

     public function bukti_pdf($id)
    {
        
         $datas = Pembayaran::where('id_pembayaran',$id)->get();
         $today = Carbon::now()->format('d-m-Y');



         $pdf= PDF::loadView('pembayaran.bukticetak_pdf', array('datas'=>$datas,'today'=>$today)); 
        
        return $pdf->stream('pembayaran_bukticetak_'.date('Y-m-d_H-i-s').'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = \App\Pembayaran::find($id);
        return view('pembayaran/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Pembayaran::find($id);

        $data->id_santri = $request->input('id_santri');
        $data->id_periode = $request->input('id_periode');
        $data->bulan = $request->input('bulan');
        $data->tgl_pembayaran = $request->input('tgl_pembayaran');
        $data->spp = $request->input('spp');
        $data->status = $request->input('status');
                     
        $data->update();


         $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_riwayat);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'bulan'=>$data->bulan,
                            'status_pembayaran'=>$data->status,
                         ]);
                    
              
                $detail3->save();
            }
           
         return redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = \App\Pembayaran::find($id);
        $data->delete();
         return redirect()->route('pembayaran.index')->with('success', 'Data berhasil dihapus!');
    }


   

    public function getAllFields(Request $request)
    {
        $getFields = Santri::join(
            "h_beasiswa",
            "h_beasiswa.id_santri",
            "=",
            "santri.id_santri"
        )->where("santri.id_santri",$request->id_santri)->first();
        return response()->json($getFields,200);
    }

    //  public function getAllFields(Request $request)
    // {
    //     $getFields = Santri::where("id_santri",$request->id_santri)->first();
    //     return response()->json($getFields,200);
    // }
}
