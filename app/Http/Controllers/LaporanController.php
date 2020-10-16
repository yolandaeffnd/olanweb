<?php

namespace App\Http\Controllers;
use PDF;
use App\Riwayat;
use App\Registrasi;
use App\Pembayaran;
use App\HalaqahSantri;
use App\Pembelajaran;
use App\Penempatan;
use App\Santri;
use App\Beasiswa;
use App\Periode2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            if($status=='semua')
            {
                $datas = Registrasi::whereYear('tgl',$tahun)->whereMonth('tgl',$bulan)->get();
         
            }
            else{

                $datas = Registrasi::whereYear('tgl',$tahun)->whereMonth('tgl',$bulan)->where('status',$status)->get();
         
            }
           
         
           
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
            if($status=='semua')
            {
                $datas = Registrasi::whereYear('tgl',$tahun)->whereMonth('tgl',$bulan)->get();
         
            }
            else{

                $datas = Registrasi::whereYear('tgl',$tahun)->whereMonth('tgl',$bulan)->where('status',$status)->get();
         
            }
         

           
           
        }
        else{
            $datas = Registrasi::get();
            $tahun = "-";
            $bulan = "-";
            $status ="-";
			           
           
   
        }

        $today = Carbon::today()->format('d-m-Y');
        $c1=$datas->count();

         $pdf= PDF::loadView('laporan.regis2_pdf', array('datas'=>$datas,'tahun'=>$tahun,'bulan'=>$bulan,'status'=>$status,'today'=>$today,'c1'=>$c1));
        return $pdf->stream('laporan_regis2_'.date('Y-m-d_H-i-s').'.pdf');
	}

	public function santri_view(Request $request)
	{
		if(!empty($request->query('id_periode'))&& !empty($request->query('jk'))&& !empty($request->query('status'))) {
			$status = $request->query('status');
			$periode = $request->query('id_periode');
			$jk = $request->query('jk');

            $a ='aktif';
            
            if($jk=='semua')
            {
                if($status==2)
			    {
				  $datas = DB::table('santri')
		            ->join('h_registrasi', 'santri.id_santri', '=', 'h_registrasi.id_santri')
		            ->select('santri.*', 'h_registrasi.id_periode')
		            ->where('h_registrasi.id_periode',$periode)
		            ->distinct('santri.id_santri','h_registrasi.id_periode')->get();


		           
			    }
    			else{

				  $datas = Beasiswa::where('id_periode',$periode)->where('status_beasiswa',$a)->groupBy('id_santri');


			    }
            
            }else{
                if($status==2)
			    {
				  $datas = DB::table('santri')
		            ->join('h_registrasi', 'santri.id_santri', '=', 'h_registrasi.id_santri')
		            ->select('santri.*', 'h_registrasi.id_periode')
		            ->where('santri.jk',$jk)
		            ->where('h_registrasi.id_periode',$periode)
		            ->distinct('santri.id_santri','h_registrasi.id_periode')->get();


		           
			    }
    			else{

				  $datas = Beasiswa::where('id_periode',$periode)->where('status_beasiswa',$a)->groupBy('id_santri');


			    }
            }
			  
		
        }
        else{

            $datas = Santri::all();
        }
           
      
          return view('laporan.santri',array('datas'=>$datas));
	}


	
	public function santri_pdf(Request $request)
	{
		if(!empty($request->query('id_periode'))&& !empty($request->query('jk'))&& !empty($request->query('status'))) {
			$status = $request->query('status');
			$periode = $request->query('id_periode');
			$jk = $request->query('jk');

            $result = DB::table('h_periode')->select('tahun_akademik')->where('id_periode',$periode)->first();
            $pr = $result->tahun_akademik;
       		 	

			$a ='aktif';
            if($jk=='semua')
            {
                if($status==2)
			    {
				  $datas = DB::table('santri')
		            ->join('h_registrasi', 'santri.id_santri', '=', 'h_registrasi.id_santri')
		            ->select('santri.*', 'h_registrasi.id_periode')
		            ->where('h_registrasi.id_periode',$periode)
		            ->distinct('santri.id_santri','h_registrasi.id_periode')->get();


		           
			    }
    			else{

				  $datas = Beasiswa::where('id_periode',$periode)->where('status_beasiswa',$a)->groupBy('id_santri');


			    }
            
            }else{
                if($status==2)
			    {
				  $datas = DB::table('santri')
		            ->join('h_registrasi', 'santri.id_santri', '=', 'h_registrasi.id_santri')
		            ->select('santri.*', 'h_registrasi.id_periode')
		            ->where('santri.jk',$jk)
		            ->where('h_registrasi.id_periode',$periode)
		            ->distinct('santri.id_santri','h_registrasi.id_periode')->get();


		           
			    }
    			else{

				  $datas = Beasiswa::where('id_periode',$periode)->where('status_beasiswa',$a)->groupBy('id_santri');


			    }
            }
			
        }
        else{

            $datas = Santri::all();
            $periode ="-";
            $jk="-";
            $pr="-";
        }
           
      
        $today = Carbon::now()->format('d-m-Y');
        $c1=$datas->count();

         $pdf= PDF::loadView('laporan.santri_pdf', array('datas'=>$datas,'periode'=>$periode,'today'=>$today,'c1'=>$c1,'jk'=>$jk,'pr'=>$pr))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_santri_'.date('Y-m-d_H-i-s').'.pdf');
	}

	public function pembayaran_view(Request $request)
	{
		if(!empty($request->query('tahun'))&& !empty($request->query('bulan'))) {
            $tahun = Carbon::parse($request->query('tahun'))->format('Y');
            $bulan = Carbon::parse($request->query('bulan'))->format('m');
            $datas = Pembayaran::whereYear('tgl_pembayaran',$tahun)->whereMonth('tgl_pembayaran',$bulan)->get();
           
        }
        else{
            $datas = Pembayaran::all();
           
        }
          return view('laporan.pembayaran',array('datas'=>$datas));
	}

	public function pembayaran_pdf(Request $request)
	{
		if(!empty($request->query('tahun'))&& !empty($request->query('bulan'))) {
            $tahun = Carbon::parse($request->query('tahun'))->format('Y');
            $bulan = Carbon::parse($request->query('bulan'))->format('m');
            $datas = Pembayaran::whereYear('tgl_pembayaran',$tahun)->whereMonth('tgl_pembayaran',$bulan)->get();
           
        }
        else{
            $datas = Pembayaran::all();
            $tahun = "-";
            $bulan = "-";

           
        }
        $today = Carbon::now()->format('d-m-Y');
        $c1=$datas->count();

         $pdf= PDF::loadView('laporan.pembayaran_pdf', array('datas'=>$datas,'tahun'=>$tahun,'today'=>$today,'c1'=>$c1,'bulan'=>$bulan)); 
        return $pdf->stream('laporan_pembayaran_'.date('Y-m-d_H-i-s').'.pdf');
	}

	public function halaqahsantri_view(Request $request)
	{
		if(!empty($request->query('id_halaqah'))) {
            $halaqah = $request->query('id_halaqah');
           
            $datas = HalaqahSantri::where('id_halaqah',$halaqah)->get();
           
        }
        else{
            $datas = HalaqahSantri::all();
           
        }
          return view('laporan.halaqahsantri',array('datas'=>$datas));
	}



	public function halaqahsantri_pdf(Request $request)
	{
		if(!empty($request->query('id_halaqah'))) {
            $halaqah = $request->query('id_halaqah');
           
            $datas = HalaqahSantri::where('id_halaqah',$halaqah)->get();

            $result = DB::table('h_halaqah')->select('kode_halaqah')->where('id_halaqah',$halaqah)->first();
            $hq = $result->kode_halaqah;
           
        }
        else{
            $datas = HalaqahSantri::all();
            $hq ="-";
           
        }
        $today = Carbon::now()->format('d-m-Y');
        $c1=$datas->count();
        
         $pdf= PDF::loadView('laporan.halaqahsantri_pdf', array('datas'=>$datas,'today'=>$today,'c1'=>$c1,'hq'=>$hq)); 
        return $pdf->stream('laporan_halaqahsantri_'.date('Y-m-d_H-i-s').'.pdf');
	}


	public function dftunggu_view(Request $request)
	{
		if(!empty($request->query('status'))) {
            $status = $request->query('status');
           
            $datas = Penempatan::where('status',$status)->get();
           
        }
        else{
            $datas = Penempatan::all();
           
        }
          return view('laporan.dftunggu',array('datas'=>$datas));
	}

	public function dftunggu_pdf(Request $request)
	{
		if(!empty($request->query('status'))) {
            $status = $request->query('status');
            $datas = Penempatan::where('status',$status)->get();
           
        }
        else{
            $datas = Penempatan::all();
           
        }
        
        $today = Carbon::now()->format('d-m-Y');
        $c1=$datas->count();

         $pdf= PDF::loadView('laporan.dftunggu_pdf', array('datas'=>$datas,'today'=>$today,'c1'=>$c1,'status'=>$status)); 
        return $pdf->stream('laporan_dftunggu_'.date('Y-m-d_H-i-s').'.pdf');
        
	}


    public function pembelajaran_view(Request $request)
    {
        if(!empty($request->query('id_santri'))&& !empty($request->query('id_halaqah'))) {
            $santri = $request->query('id_santri');
            $halaqah = $request->query('id_halaqah');
             
            $result = DB::table('h_halaqah')->select('kode_halaqah')->where('id_halaqah',$halaqah)->first();
            $kelas = $result->kode_halaqah;

            $datas = DB::table('h_pembelajaran')
                    ->join('pertemuan', 'h_pembelajaran.id_pertemuan', '=', 'pertemuan.id_pertemuan')
                    ->select('h_pembelajaran.*','pertemuan.id_halaqah')
                    ->where('pertemuan.id_halaqah',$halaqah)
                    ->where('h_pembelajaran.id_santri',$santri)->get(); 

            $result = DB::table('santri')->select('nama_santri')->where('id_santri',$santri)->first();
            $nama = $result->nama_santri;

            $result2 = DB::table('santri')->select('nis')->where('id_santri',$santri)->first();
            $nis = $result2->nis;

            
                            
           
        }
        else{
            $datas = Pembelajaran::all();
           
        }

        
           return view('laporan.pembelajaran',array('datas'=>$datas));
    }

    public function pembelajaran_pdf(Request $request)
    {
        if(!empty($request->query('id_santri'))&& !empty($request->query('id_halaqah'))) {
            $santri = $request->query('id_santri');
            $halaqah = $request->query('id_halaqah');
            $hqq = DB::table('h_halaqah')
                    ->join('pegawai', 'h_halaqah.id_pegawai', '=', 'pegawai.id_pegawai')
                    ->select('h_halaqah.*','pegawai.nama_guru as namapengajar')
                    ->where('h_halaqah.id_halaqah',$halaqah)->get();
        

            // $result = DB::table('pegawai')->select('nama_guru')->where('id_halaqah',$halaqah)->first();
            // $hq = $result->nama_guru;

               
            $datas = DB::table('h_pembelajaran')
                    ->join('pertemuan', 'h_pembelajaran.id_pertemuan', '=', 'pertemuan.id_pertemuan')
                    ->select('h_pembelajaran.*','pertemuan.id_halaqah')
                    ->where('pertemuan.id_halaqah',$halaqah)
                    ->where('h_pembelajaran.id_santri',$santri)->get(); 

            $result = DB::table('santri')->select('nama_santri')->where('id_santri',$santri)->first();
            $nama = $result->nama_santri;

            $result2 = DB::table('santri')->select('nis')->where('id_santri',$santri)->first();
            $nis = $result2->nis;

            $c1 = DB::table('h_riwayat')->where('id_santri',$santri)->get();
         
           
        }
        else{
            $datas = Pembelajaran::all();
            $nama="-";
            $nis="-";
            $c1="";
            $hqq="";
           
                       
        }

        
        $today = Carbon::now()->format('d-m-Y');
        

         $pdf= PDF::loadView('laporan.pembelajaran_pdf', array('datas'=>$datas,'today'=>$today,'c1'=>$c1,'nama'=>$nama,'nis'=>$nis,'hqq'=>$hqq)); 
        return $pdf->stream('laporan_pembelajaran_'.date('Y-m-d_H-i-s').'.pdf');
    }



    public function keaktifan_view(Request $request)
    {
        if(!empty($request->query('id_santri'))&& !empty($request->query('id_halaqah'))) {
            $santri = $request->query('id_santri');
            $halaqah = $request->query('id_halaqah');
             
            $result = DB::table('h_halaqah')->select('kode_halaqah')->where('id_halaqah',$halaqah)->first();
            $kelas = $result->kode_halaqah;

            $datas = DB::table('h_riwayat')->where('id_santri',$santri)->where('id_halaqah',$halaqah)->get();

            $result = DB::table('santri')->select('nama_santri')->where('id_santri',$santri)->first();
            $nama = $result->nama_santri;

            $result2 = DB::table('santri')->select('nis')->where('id_santri',$santri)->first();
            $nis = $result2->nis;
        }
        else{
            $datas = Riwayat::all();  
        }
           return view('laporan.aktifsantri',array('datas'=>$datas));
    }

    public function keaktifan_pdf(Request $request)
    {
        if(!empty($request->query('id_santri'))&& !empty($request->query('id_halaqah'))) {
            $santri = $request->query('id_santri');
            $halaqah = $request->query('id_halaqah');
             
            $result = DB::table('h_halaqah')->select('kode_halaqah')->where('id_halaqah',$halaqah)->first();
            $kelas = $result->kode_halaqah;

            $datas = DB::table('h_pembelajaran')
                    ->join('pertemuan', 'h_pembelajaran.id_pertemuan', '=', 'pertemuan.id_pertemuan')
                    ->select('h_pembelajaran.*','pertemuan.id_halaqah')
                    ->where('pertemuan.id_halaqah',$halaqah)
                    ->where('h_pembelajaran.id_santri',$santri)->get(); 


            $result = DB::table('santri')->select('nama_santri')->where('id_santri',$santri)->first();
            $nama = $result->nama_santri;

            $result2 = DB::table('santri')->select('nis')->where('id_santri',$santri)->first();
            $nis = $result2->nis;

        }
        else{
            $datas = Pembelajaran::all();
           
        }

           return view('laporan.pembelajaran',array('datas'=>$datas));
    }








    
}
