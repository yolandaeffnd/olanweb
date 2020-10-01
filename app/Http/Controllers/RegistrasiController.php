<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Registrasi;
use App\Jadwal;
use App\Santri;
use App\Periode2;
use App\Penempatan;
use App\Riwayat;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas= Registrasi::orderBy('id_registrasi','asc')->get();
        return view('registrasi.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode2= Periode2::orderBy('kode_periode','asc')->get();
        $santri= Santri::orderBy('id_santri','asc')->get();
        $jadwal= Jadwal::orderBy('id_jadwal','asc')->get();
        $data = \App\Registrasi::all();    
       return view('registrasi/create',compact('periode2','santri','jadwal','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->input('tipe')=='Baru'){

             $santri = Santri::create([
            'id_santri'=>$request->id_santri,
            'nis' => $request->get('nis'),
            'nama_santri' => $request->get('nama_santri'),
            'panggilan' => $request->get('panggilan'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'jk' => $request->get('jk'),
            'alamat' => $request->get('alamat'),
            'pendidikan' => $request->get('pendidikan'),
            'kelas' => $request->get('kelas'),
            'jespem' => $request->get('jespem'),
            'nama_ayah' => $request->get('nama_ayah'),
            'pekerjaan_ayah' => $request->get('pekerjaan_ayah'),
            'nama_ibu' => $request->get('nama_ibu'),
            'pekerjaan_ibu' => $request->get('pekerjaan_ibu'),
            'no_hp' => $request->get('no_hp'),
            'tujuan_masuk' => $request->get('tujuan_masuk'),
            'totjuz' => $request->get('totjuz'),
      
        
        ]);
        $data = Registrasi::create([
    
        'tipe' => $request->get('tipe'),
        'id_periode' => $request->get('id_periode'),
        'tgl' => $request->get('tgl'),
        'id_santri'=>$santri->id_santri,
        'id_jadwal' => $request->get('id_jadwal'),
        'status' => $request->get('status'),
        'status_pembayaran' => $request->get('status_pembayaran'),
        'jumlah_pembayaran' => $request->get('jumlah_pembayaran'),
        'tgl_pembayaran' => $request->get('tgl_pembayaran'),

         ]);

        Penempatan::create([
              'id_periode'=>$data->id_periode,
              'id_jadwal'=>$data->id_jadwal,
              'id_santri'=>$santri->id_santri,
              'id_halaqah'=>null,
              'id_pembelajaran_periode'=>null,
              'status'=>'menunggu',
              'tgl_regis'=>$data->tgl,
              'tgl_mulai'=>null,
              'status_registrasi'=>$data->tipe,
              

          ]);


            Riwayat::create([
              'id_halaqah'=>null,
              'bulan'=>null,
              'id_santri'=>$santri->id_santri,
              'total_juz'=>null,
              'surat_selesai'=>null,
              'total_pertemuan'=>'0',
              'total_hadir'=>'0',
              'total_alfa'=>'0',
              'total_sakit'=>'0',
              'status_pembayaran'=>null,
              'status_keaktifan'=>$data->status,
              
              

          ]);
         
         

        
        
         
         }else{

         $data = Registrasi::create([
    
        'tipe' => $request->get('tipe'),
        'id_periode' => $request->get('id_periode'),
        'tgl' => $request->get('tgl'),
        'id_santri' => $request->get('id_santri'), 
        'id_jadwal' => $request->get('id_jadwal'),
        'status' => $request->get('status'),
        'status_pembayaran' => $request->get('status_pembayaran'),
        'jumlah_pembayaran' => $request->get('jumlah_pembayaran'),
        'tgl_pembayaran' => $request->get('tgl_pembayaran'),

            ]);


            Penempatan::create([
              'id_periode'=>$data->id_periode,
              'id_jadwal'=>$data->id_jadwal,
              'id_santri'=>$data->id_santri,
              'id_halaqah'=>null,
              // 'id_pembelajaran_periode'=>null,
              'status'=>'menunggu',
              'tgl_regis'=>$data->tgl,
              'tgl_mulai'=>null,
              'status_registrasi'=>$data->tipe,
              

          ]);

          
         




         }

        // if($request->input('tipe')=='Baru'){
            

        // }
        
       
        return redirect('/registrasi')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Registrasi $registrasi)
    {
        // $data = \App\Registrasi::find($id);
        // return view('registrasi/edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data = \App\Registrasi::find($id);
        return view('registrasi/edit', compact('data'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Registrasi::find($id);

        // $data->tipe = $request->input('tipe');
        // $data->id_periode = $request->input('id_periode');
        //   $data->tgl = $request->input('tgl');
         $data->id_santri = $request->input('id_santri');
          // $data->id_jadwal = $request->input('id_jadwal');
           $data->status = $request->input('status');
           $data->status_pembayaran = $request->input('status_pembayaran');
             $data->jumlah_pembayaran = $request->input('jumlah_pembayaran');
               $data->tgl_pembayaran = $request->input('tgl_pembayaran');

   
        $data->update();

        $alldetail3= Riwayat::where('id_santri',$data->id_santri)->get();
             foreach($alldetail3 as $d){
                 $detail3=Riwayat::find($d->id_santri);
                   $detail3->where('id_santri', $data->id_santri)
                        ->update([
                            'status_keaktifan'=>$data->status,
                         ]);
                    
              
                $detail3->save();
            }


         return redirect()->route('registrasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = \App\Registrasi::find($id);
        $data->delete();
         return redirect()->route('registrasi.index')->with('success', 'Data berhasil dihapus!');
    }
}
