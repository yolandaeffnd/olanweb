<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Registrasi Santri</title>
    <style>
				table {
				  border-collapse: collapse;
				}

				.line-title{
          border-collapse: collapse;
          border-top: 3px solid #000;
          color: black;
        }
		</style>
</head>
<body>
<img src="{{public_path('assets/images/quran.jpg')}}" style="position: absolute; width: 100px; height: auto;">

<table >
        <tr>
          <td align="center">
            <span style="font-size: 28px; line-height: 1.3; font-weight: bold;">
                RUMAH TAHFIZH AHLUL QURAN</span>
            <span style="font-size: 20px; line-height: 1.3;">
                <br>Jl. Ikhlas Raya Komp. Puri Berlindo No.9 Kubu Dalam  Parak Karakah </span>
                 <span style="font-size: 20px; line-height: 1.3;">
                <br>Kec. Padang Timur, Kota Padang</span>
                 <span style="font-size: 20px; line-height: 1.3;">
                <br>Telp: 081261772857</span>
          </td>
        </tr>
  </table>

 <hr class="line-title">
		 <center><p><span style="font-size: 22px;  font-weight: bold;">BUKTI PEMBAYARAN SPP</span></p>
		 </center><br><br>
<table style="width: 100%" border="0" border-collapse: collapse; borderspacing="0" cellpadding="10" >
   @foreach($datas as $data)
                      
                    <tr tr style="font-size: 18px; font-weight: bold">      
                      <td>NIS</td><td>:</td>
                          @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nis}}</td>
                          @endif
                      </tr>
                       <tr tr style="font-size: 18px; font-weight: bold">      
                      <td>NAMA</td><td>:</td>
                          @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nama_santri}}</td>
                          @endif
                      </tr>
                      <tr tr style="font-size: 18px; font-weight: bold">
                       <td>PERIODE BERLAKU</td><td>:</td>
                       @if(!empty($data->periode2->id_periode))
                          <td>{{$data->periode2->tahun_akademik}}</td>
                          @endif
                     </tr>
                     <tr tr style="font-size: 18px; font-weight: bold">
                      <td>JUMLAH PEMBAYARAN</td><td>:</td>
                       <td>Rp.{{$data->spp}}</td>
                    </tr>
                    <tr tr style="font-size: 18px; font-weight: bold">
                      <td>BULAN</td><td>:</td>
                       <td>{{$data->bulan}}</td>
                    </tr>
                    <tr tr style="font-size: 18px; font-weight: bold">
                      <td>TANGGAL PEMABAYARAN</td><td>:</td>
                        <td>{{$data->tgl_pembayaran}}</td>
                    </tr>
                    <tr tr style="font-size: 18px; font-weight: bold">
                      <td>STATUS</td><td>:</td>
                      <td>{{$data->status}}</td>
                    </tr>
                      
                    @endforeach
                         
      
                 
                      

                           
  </table>
  <br><br>
 <table>

		<br><br><br><br>
 </table>
   <table style="font-weight: bold;" align="right">
    		<tr><td><br><br></td>
    			<td>Padang, <?php echo $today;?><br><center>Bendahara</center><br></td>
   			</tr>
    		<tr>
    			<td><br><br><br><br><br><br><br><br><br><br></td>
    			<td height="100">(Deni Hamdani, M.Ag)</td>
    		</tr>
		</table>
<br><br><br><br><br><br><br><br><br><br><br>
<table style="font-weight: bold;font-style: italic" align="center">
	<tr>
		<td>
				Dihasilkan oleh SIMAQ 
		</td>
	</tr>
</table>
<br><br>
</body>
</html>