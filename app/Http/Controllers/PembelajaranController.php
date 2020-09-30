<?php

namespace App\Http\Controllers;

use App\Pembelajaran;
use App\Pertemuan;
use App\Riwayat;
use App\Guru;
use App\Santri;
use App\Juz;
use App\Surat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= \App\Pembelajaran::all();
        return view('pembelajaran.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pertemuan= Pertemuan::orderBy('id_pertemuan','asc')->get();
        $guru= Guru::orderBy('id_pegawai','asc')->get();
        $santri= Santri::orderBy('id_santri','asc')->get();
        $juz= Juz::orderBy('id_juz','asc')->get();
        $surat= Surat::orderBy('id_surat','asc')->get();
       
        $data = \App\Penempatan::all();    
       return view('pembelajaran/create',compact('pertemuan','guru','santri','juz','surat','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = Pembelajaran::create([
    
        'id_pertemuan' => $request->get('id_pertemuan'),
        'id_pegawai' => $request->get('id_pegawai'),
        'id_santri' => $request->get('id_santri'),
        'tgl' => $request->get('tgl'),
        'kehadiran' => $request->get('kehadiran'),
        'id_juz_mulai' => $request->get('id_juz_mulai'),
        'surat_mulai' => $request->get('surat_mulai'),
        'ayat_mulai' => $request->get('ayat_mulai'),
        'id_juz_selesai' => $request->get('id_juz_selesai'),
        'surat_selesai' => $request->get('surat_selesai'),
        'ayat_selesai' => $request->get('ayat_selesai'),
        'total_juz' => 0,
        
        ]);


       
         $alldetail= Pembelajaran::where('id_pembelajaran',$data->id_pembelajaran)->get();
             foreach($alldetail as $d){
                $detail=Pembelajaran::find($d->id_pembelajaran);
                     $detail->where('id_pembelajaran', $data->id_pembelajaran)
                        ->update([
                            'total_juz' => ($detail->total_juz+($data->id_juz_selesai-$data->id_juz_mulai)),
                           
                            ]);
            
                $detail->save();
            }


           $a ='hadir';
           $d ='sakit';
           $c ='alfa';
          $jumlah = DB::table('h_pembelajaran')->where('id_santri',$data->id_santri)->sum('total_juz');
  $allp= Pembelajaran::where('id_santri',$data->id_santri)->get();
              foreach($allp as $b){
                $detail2=Pembelajaran::find($b->id_pembelajaran);
                     $detail2->where('id_pembelajaran', $data->id_pembelajaran);

                        
                        $count2 = Pembelajaran::where('kehadiran',$a)->count();
                        $count3 = Pembelajaran::where('kehadiran',$d)->count();
                        $count4 = Pembelajaran::where('kehadiran',$c)->count();
                      
                  

               
            }
             $detail2->save();
       


             $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_santri);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'total_hadir'=>($detail3->total_hadir-$detail3->total_hadir+$count2),
                             'total_sakit'=>($detail3->total_sakit-$detail3->total_sakit+$count3),
                             'total_alfa'=>($detail3->total_alfa-$detail3->total_alfa+$count4),
                             'total_juz'=>($detail3->total_juz-$detail3->total_juz+$jumlah),
                             'surat_selesai'=>$data->surat_selesai,
                         ]);
                    
              
                $detail3->save();
            }

        // $alldetail4= Riwayat::where('id_santri',$data->id_santri)->get();
        //      foreach($alldetail4 as $d){
        //          $detail4=Riwayat::find($d->id_santri);
        //            $detail4->where('id_santri', $data->id_santri)
        //                 ->update([
                           
        //                      'total_sakit'=>($detail4->total_sakit-$detail4->total_sakit+$count3),
                            
        //                  ]);
                    
              
        //         $detail4->save();
        //     }

        // $alldetail5= Riwayat::where('id_santri',$data->id_santri)->get();
        //      foreach($alldetail5 as $d){
        //          $detail5=Riwayat::find($d->id_santri);
        //            $detail5->where('id_santri', $data->id_santri)
        //                 ->update([
                           
        //                      'total_alfa'=>($detail5->total_alfa-$detail5->total_alfa+$count4),
        //                  ]);
                    
              
        //         $detail5->save();
        //     }
       


          

        return redirect('/pembelajaran')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelajaran $pembelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Pembelajaran::find($id);
        return view('pembelajaran/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Pembelajaran::find($id);

        $data->id_pertemuan = $request->input('id_pertemuan');
        $data->id_pegawai = $request->input('id_pegawai');
        $data->id_santri = $request->input('id_santri');
        $data->tgl = $request->input('tgl');
        $data->kehadiran = $request->input('kehadiran');
        $data->id_juz_mulai = $request->input('id_juz_mulai');
        $data->surat_mulai = $request->input('surat_mulai');
        $data->ayat_mulai = $request->input('ayat_mulai');
        $data->id_juz_selesai = $request->input('id_juz_selesai');
        $data->surat_selesai = $request->input('surat_selesai');
        $data->ayat_selesai = $request->input('ayat_selesai');
        
        $data->update();





          $alldetail= Pembelajaran::where('id_pembelajaran',$data->id_pembelajaran)->get();
             foreach($alldetail as $d){
                $detail=Pembelajaran::find($d->id_pembelajaran);
                     $detail->where('id_pembelajaran', $data->id_pembelajaran)
                        ->update([
                            'total_juz' => ($detail->total_juz+($data->id_juz_selesai-$data->id_juz_mulai)),
                            ]);
            
                $detail->save();
            }


           $a ='hadir';
           $d ='sakit';
           $c ='alfa';
          $jumlah = DB::table('h_pembelajaran')->where('id_santri',$data->id_santri)->sum('total_juz');
          $allp= Pembelajaran::where('id_santri',$data->id_santri)->get();
              foreach($allp as $b){
                $detail2=Pembelajaran::find($b->id_pembelajaran);
                     $detail2->where('id_pembelajaran', $data->id_pembelajaran);

                        
                        $count2 = Pembelajaran::where('kehadiran',$a)->count();
                        $count3 = Pembelajaran::where('kehadiran',$d)->count();
                        $count4 = Pembelajaran::where('kehadiran',$c)->count();
                      
                  

               
            }
             $detail2->save();
       


             $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_santri);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'total_hadir'=>($detail3->total_hadir-$detail3->total_hadir+$count2),
                             'total_sakit'=>($detail3->total_sakit-$detail3->total_sakit+$count3),
                             'total_alfa'=>($detail3->total_alfa-$detail3->total_alfa+$count4),
                             'total_juz'=>($detail3->total_juz-$detail3->total_juz+$jumlah),
                             'surat_selesai'=>$data->surat_selesai,
                         ]);
                    
              
                $detail3->save();
            }
         return redirect()->route('pembelajaran.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Pembelajaran::find($id);
        $data->delete();
         return redirect()->route('pembelajaran.index')->with('success', 'Data berhasil dihapus!');
    }


    



}
