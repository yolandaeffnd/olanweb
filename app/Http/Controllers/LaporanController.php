<?php

namespace App\Http\Controllers;
use PDF;
use App\Riwayat;
use App\Registrasi;
use App\Pembayaran;
use App\HalaqahSantri;
use App\Pembelajaran;
use App\Penempatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
	public function registrasi()
	{
         $datas = Registrasi::all();
        return view('laporan.regis2',compact('datas'));
	}

	public function registrasi_view(Request $request)
	{
		if(!empty($request->query('tahun'))&& !empty($request->query('bulan'))&& !empty($request->query('status'))) {
			$status = $request->query('status');
            $tahun = Carbon::parse($request->query('tahun'))->format('Y');
            $bulan = Carbon::parse($request->query('bulan'))->format('m');
            $datas = Registrasi::whereYear('tgl',$tahun)->whereMonth('tgl',$bulan)->where('status',$status)->get();
            
           
        }
        else{
            $datas = Registrasi::all();
           
        }
          return view('laporan.regis2',array('datas'=>$datas));
 
	}


	public function registrasi_pdf(Request $request)
	{


		if(!empty($request->query('tahun'))&& !empty($request->query('bulan'))&& !empty($request->query('status'))) {
			$status = $request->query('status');
            $tahun = Carbon::parse($request->query('tahun'))->format('Y');
            $bulan = Carbon::parse($request->query('bulan'))->format('m');
            $datas = Registrasi::whereYear('tgl',$tahun)->whereMonth('tgl',$bulan)->where('status',$status)->get();
            $st = Registrasi::select('status')->where('status',$status)->distinct()->get();
           
           
        }
        else{
            $datas = Registrasi::get();
           
            $tahun ="";
            $bulan="";
         	$status="";
   
        }

         $pdf= PDF::loadView('laporan.regis2_pdf', array('datas'=>$datas,'tahun'=>$tahun,'bulan'=>$bulan,'status'=>$status));
        return $pdf->download('laporan_regis2_'.date('Y-m-d_H-i-s').'.pdf');
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
