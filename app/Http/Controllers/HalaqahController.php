<?php
namespace App\Http\Controllers;
use App\Halaqah;
use App\Guru;
use App\Periode2;
use App\Tempat;
use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HalaqahController extends Controller
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
        if(Auth::user()->level != 'Admin'&&'Wakbid Kesiswaan') {

            return view('/blok');
        }
         $datas= \App\Halaqah::all();
        return view('halaqah2.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level != 'Admin'&&'Wakbid Kesiswaan') {

            return view('/blok');
        }
        $guru= Guru::orderBy('id_pegawai','asc')->get();
        $tempat= Tempat::orderBy('id_tempat','asc')->get();
        $jadwal= Jadwal::orderBy('id_jadwal','asc')->get();
        $periode2= Periode2::orderBy('id_periode','asc')->get();
        
        $data = \App\Halaqah::all();    
       return view('halaqah/create',compact('guru','tempat','jadwal','periode2','data'));
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
     * @param  \App\Halaqah  $halaqah
     * @return \Illuminate\Http\Response
     */
    public function show(Halaqah $halaqah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Halaqah  $halaqah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->level != 'Admin'&&'Wakbid Kesiswaan') {

            return view('/blok');
        }
          $data = \App\Halaqah::find($id);
        return view('halaqah/edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Halaqah  $halaqah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = \App\Halaqah::find($id);

        $data->kode_halaqah = $request->input('kode_halaqah');
        $data->jeniskelas = $request->input('jeniskelas');
         $data->id_pegawai = $request->input('id_pegawai');
          $data->id_tempat = $request->input('id_tempat');
          $data->id_periode = $request->input('id_periode');
          $data->id_jadwal = $request->input('id_jadwal');
          $data->jk = $request->input('jk');
        
          
           

   
        $data->update();
         return redirect()->route('halaqah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Halaqah  $halaqah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Halaqah::find($id);
        $data->delete();
         return redirect()->route('halaqah.index')->with('success', 'Data berhasil dihapus!');
    }
}
