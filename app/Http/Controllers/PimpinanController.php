<?php
namespace App\Http\Controllers;
use App\Registrasi;
use App\Periode2;
use App\Santri;
use App\Agenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PimpinanController extends Controller
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
        $periode = \App\Periode2::all();
        $registrasi = \App\Registrasi::all();
        
        $kategori = [];
        $data = [];


     
            foreach ($periode as $per)
            {
              $kategori[] = $per->tahun_akademik;
              $data[]= $registrasi->where('id_periode',$per->id_periode)->count('id_santri');   
            }
           
           $santri = \App\Santri::all()->count();
           $guru = \App\Guru::all()->count();
           $tempat = \App\Tempat::all()->count();

           $a='perempuan';
           $b='laki-laki';




               $lk = Santri::where('jk',$b)->count();
               $wa = Santri::where('jk',$a)->count();


               $agenda= Agenda::orderBy('id_agenda','asc')->get();
    
    
        // foreach ($periode as $per) {
        //     $kategori[] = $per->tahun_akademik;
        // }

         // dd($data);

         return view('pimpinan.index',['kategori'=>$kategori,'data'=>$data,'santri'=>$santri,'guru'=>$guru,'tempat'=>$tempat,'lk'=>$lk,'wa'=>$wa,'agenda'=>$agenda]);
    }


    public function beranda()
    {
        $periode = \App\Periode2::all();
        $registrasi = \App\Registrasi::all();
        
        $kategori = [];
        $data = [];


     
            foreach ($periode as $per)
            {
              $kategori[] = $per->tahun_akademik;
              $data[]= $registrasi->where('id_periode',$per->id_periode)->count('id_santri');   
            }
           
           $santri = \App\Santri::all()->count();
           $guru = \App\Guru::all()->count();
           $tempat = \App\Tempat::all()->count();

           $a='perempuan';
           $b='laki-laki';




               $lk = Santri::where('jk',$b)->count();
               $wa = Santri::where('jk',$a)->count();


               $agenda= Agenda::orderBy('id_agenda','asc')->get();
    
    
        // foreach ($periode as $per) {
        //     $kategori[] = $per->tahun_akademik;
        // }

         // dd($data);

         return view('beranda',['kategori'=>$kategori,'data'=>$data,'santri'=>$santri,'guru'=>$guru,'tempat'=>$tempat,'lk'=>$lk,'wa'=>$wa,'agenda'=>$agenda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
