<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        'username' => $request->get('username'),
        'password' => $request->get('password'),
        'gambar' => null,
        
        ]);
        return redirect('/guru')->with('sukses','data berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
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
        $data->tgl_lahir = $request->input('tgl_lahir');
        $data->jk = $request->input('jk');
        $data->alamat = $request->input('alamat');
        $data->nohp = $request->input('nohp');
        $data->email = $request->input('email');
        $data->lulusan = $request->input('lulusan');
        $data->tgl_masuk = $request->input('tgl_masuk');
        $data->jml_hafalan = $request->input('jml_hafalan');
        $data->jabatan = $request->input('jabatan');
        $data->username = $request->input('username');
        $data->password = $request->input('password');
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
