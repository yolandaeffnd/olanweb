<?php

namespace App\Http\Controllers;
use PDF;
use App\Riwayat;
use App\Registrasi;
use App\Pembayaran;
use App\HalaqahSantri;
use App\Pembelajaran;
use App\Penempatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
	public function registrasi()
	{
		// $datas= Registrasi::get();
        return view('laporan.registrasi');
	}

	public function registrasi_pdf(Request $Request)
	{
		$datas= Registrasi::get();
        return view('laporan.regsitrasi',compact('datas'));
	}

	public function pembayaran()
	{
		$datas= Registrasi::get();
        return view('laporan.pembayaran',compact('datas'));
	}

	public function pembayaran_pdf(Request $Request)
	{
		$datas= Registrasi::get();
        return view('laporan.registrasi',compact('datas'));
	}

	public function santri()
	{
		$datas= Registrasi::get();
        return view('laporan.santri',compact('datas'));
	}

	public function santri_pdf(Request $Request)
	{
		$datas= Registrasi::get();
        return view('laporan.registrasi',compact('datas'));
	}

	public function halaqahsantri()
	{
		$datas= Registrasi::get();
        return view('laporan.halaqahsantri',compact('datas'));
	}

	public function halaqahsantri_pdf(Request $Request)
	{
		$datas= Registrasi::get();
        return view('laporan.registrasi',compact('datas'));
	}

	public function aktifsantri()
	{
		$datas= Registrasi::get();
        return view('laporan.aktifsantri',compact('datas'));
	}

	public function aktifsantri_pdf(Request $Request)
	{
		$datas= Registrasi::get();
        return view('laporan.registrasi',compact('datas'));
	}

	public function dftunggu()
	{
		$datas= Registrasi::get();
        return view('laporan.dftunggu',compact('datas'));
	}

	public function dftunggu_pdf(Request $Request)
	{
		$datas= Registrasi::get();
        return view('laporan.registrasi',compact('datas'));
	}


    
}
