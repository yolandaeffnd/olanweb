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
<!-- <img src="{{asset('assets/images/simaq/tes.jpeg')}}" style="position: absolute; width: 100px; height: auto;"> -->
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
		 <center><p><span style="font-size: 22px;  font-weight: bold;">LAPORAN PEMBAYARAN SPP</span></p>
		 </center><br><br>
         <table>
<tr style="font-size: 18px; font-weight: bold">
	<td>Tahun</td>
	<td>: <?php echo $tahun;?></td>
</tr>
<tr style="font-size: 18px; font-weight: bold">
	<td>Bulan</td>
	<td> : <?php echo $bulan;?></td>
</tr>

<br>
</table>
<table style="width: 100%" border="1" border-collapse: collapse; borderspacing="0" cellpadding="2">
             <thead>
                    <tr>      
                      <th>NO</th>
                      <th>NIS</th>
                       <th>PERIODE BERLAKU</th>
                      <th>JUMLAH PEMBAYARAN</th>
                      <th>BULAN</th>
                      <th>TANGGAL PEMABAYARAN</th>
                      <th>STATUS</th>
                      
                         
      
                  
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nis}}</td>
                          @endif
                          @if(!empty($data->periode2->id_periode))
                          <td>{{$data->periode2->kode_periode}}</td>
                          @endif
                          <td>{{$data->spp}}</td>
                          <td>{{$data->bulan}}</td>
                          <td>{{$data->tgl_pembayaran}}</td>
                          <td>{{$data->status}}</td>
                          

                          
                        
                    

                        </tr>
                        @endforeach
                      </tbody>
                           
  </table>
  <br><br>
 <table>
		<tr style="font-size: 16px; font-weight: bold">
				<td>Jumlah Registrasi</td>
				<td>: <?php echo $c1;?></td>
		</tr>
		<br><br><br><br>
 </table>
   <table style="font-weight: bold;" align="right">
    		<tr><td><br><br></td>
    			<td>Padang, <?php echo $today;?><br><center>Ketua</center><br></td>
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