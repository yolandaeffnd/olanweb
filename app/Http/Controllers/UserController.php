<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use Validator;

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
        if(Auth::user()->level != 'Admin') {

            return view('/blok');
        }
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
       
        // Change Password
      if(Auth::user()->level!='Admin'){
            $user_data = Auth::user();
         }
         else
         {
            $user_data = User::findOrFail($id);
            $user_data->level=$request->input('level');
            
            if($request->input('password')) {

                $user_data->password= bcrypt(($request->input('password')));
            
            }
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
        $user_data->update();

        if(Auth::user()->level=='Admin'){
            return redirect()->route('user.index');
        }else{
            return redirect()->route('beranda');
        }

    

    }


    public function updatePassword(Request $request){
        return view('user.sandi');
    }

    public function sandiPassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8'
            
        ]);
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }
        //uncomment this if you need to validate that the new password is same as old one
    
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }
        
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return redirect()->route('beranda');
    
    


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
