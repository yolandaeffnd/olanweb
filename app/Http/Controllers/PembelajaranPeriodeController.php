<?php

namespace App\Http\Controllers;

use App\PembelajaranPeriode;
use Illuminate\Http\Request;

class PembelajaranPeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= \App\PembelajaranPeriode::all();
        return view('pembelajaranperiode.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
     * @param  \App\PembelajaranPeriode  $pembelajaranPeriode
     * @return \Illuminate\Http\Response
     */
    public function show(PembelajaranPeriode $pembelajaranPeriode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PembelajaranPeriode  $pembelajaranPeriode
     * @return \Illuminate\Http\Response
     */
    public function edit(PembelajaranPeriode $pembelajaranPeriode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PembelajaranPeriode  $pembelajaranPeriode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembelajaranPeriode $pembelajaranPeriode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembelajaranPeriode  $pembelajaranPeriode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembelajaranPeriode $pembelajaranPeriode)
    {
        //
    }
}
