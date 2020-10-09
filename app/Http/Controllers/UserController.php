<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
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
        $datas= \App\User::all();
        return view('user.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('hari.create');
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
        if(Auth::user()->level!='Admin'){
            $data = Auth::user();
         }
         else
         {
            $data = User::findOrFail($id);
         }

        return view('user.edit', compact('data'));
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
        //Change Password
      if(Auth::user()->level!='Admin'){
            $user_data = Auth::user();
         }
         else
         {
            $user_data = User::findOrFail($id);
         }

         if($request->file('gambar'))
        {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('gambar')->move("assets/images/profil", $fileName);
            $user_data->gambar = $fileName;
        }

        $user_data->nama = $request->input('nama');

        if(Auth::user()->level=='Admin'){
           $user_data->level=$request->input('level');
        }


        if($request->input('password')) {
            $user_data->password= bcrypt(($request->input('password')));
        
        }
        
        $user_data->update();

        if(Auth::user()->level=='Admin'){
            return redirect()->route('user.index');
        }else{
            return redirect()->route('beranda');
        }
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
