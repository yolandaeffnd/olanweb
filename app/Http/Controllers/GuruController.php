<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class GuruController extends Controller
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
        $datas= Guru::orderBy('id_pegawai','asc')->get();
        return view('guru.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('gambar') == '') {
            $gambar = "";
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('gambar')->move("assets/images/guru", $fileName);
            $gambar = $fileName;
        }

        $data = Guru::create([
        'nama_guru' => $request->get('nama_guru'),
        'tgl_lahir' => $request->get('tgl_lahir'),
        'jk' => $request->get('jk'),
        'alamat' => $request->get('alamat'),
        'nohp' => $request->get('nohp'),
        'email' => $request->get('email'),
        'lulusan' => $request->get('lulusan'),
        'tgl_masuk' => $request->get('tgl_masuk'),
        'jml_hafalan' => $request->get('jml_hafalan'),
        'jabatan' => $request->get('jabatan'),
        'gambar' =>  $gambar,
        
        ]);
        return redirect('/guru')->with('sukses','data berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data = \App\Guru::find($id);
        return view('guru/detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = \App\Guru::find($id);
        return view('guru/edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Guru::find($id);
        $data->nama_guru = $request->input('nama_guru');
        $data->nip = $request->input('nip');
        $data->tgl_lahir = $request->input('tgl_lahir');
        $data->jk = $request->input('jk');
        $data->alamat = $request->input('alamat');
        $data->nohp = $request->input('nohp');
        $data->email = $request->input('email');
        $data->lulusan = $request->input('lulusan');
        $data->tgl_masuk = $request->input('tgl_masuk');
        $data->jml_hafalan = $request->input('jml_hafalan');
        $data->jabatan = $request->input('jabatan');
         if($request->file('gambar'))
        {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('gambar')->move("assets/images/guru", $fileName);
            $data->gambar = $fileName;
        }
        $data->update();
      return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Guru::find($id);
        $data->delete();
         return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus!');
    }
}
