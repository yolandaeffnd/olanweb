<?php

namespace App\Http\Controllers;

use App\Santri;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Santri::orderBy('id_santri','asc')->get();

         return view('santri.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('santri.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Santri::create([
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
        'gambar' => null,
        // 'username' => $request->get('username'),
        // 'password' => $request->get('password'),
        
        ]);
        return redirect('/santri')->with('sukses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Santri::find($id);
        return view('santri/detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Santri::find($id);
        return view('santri/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = \App\Santri::find($id);
        $data->nis = $request->input('nis');
        $data->nama_santri = $request->input('nama_santri');
        $data->panggilan = $request->input('panggilan');
        $data->tempat_lahir = $request->input('tempat_lahir');
        $data->tgl_lahir = $request->input('tgl_lahir');
        $data->jk = $request->input('jk');
        $data->alamat = $request->input('alamat');
        $data->pendidikan = $request->input('pendidikan');
        $data->kelas = $request->input('kelas');
        $data->jespem = $request->input('jespem');
        $data->nama_ayah = $request->input('nama_ayah');
        $data->pekerjaan_ayah = $request->input('pekerjaan_ayah');
        $data->nama_ibu = $request->input('nama_ibu');
        $data->pekerjaan_ibu = $request->input('pekerjaan_ibu');
        $data->no_hp = $request->input('no_hp');
        $data->tujuan_masuk = $request->input('tujuan_masuk');
        $data->totjuz = $request->input('totjuz');

        // $data->username = $request->input('username');
        // $data->password = $request->input('password');
        $data->update();
         return redirect()->route('santri.index');
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Santri::find($id);
        $data->delete();
         return redirect()->route('santri.index')->with('success', 'Data berhasil dihapus!');
    }
}
