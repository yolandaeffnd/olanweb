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
		 <center><p><span style="font-size: 22px;  font-weight: bold;">LAPORAN REGISTRASI SANTRI</span></p>
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
<tr style="font-size: 18px; font-weight: bold">
	<td>Status</td>
	<td> :<?php echo $status;?></td>
</tr>
<br>
</table>
<table style="width: 100%" border="1" border-collapse: collapse; borderspacing="0" cellpadding="2">
              <thead>
                    <tr>      
                      <th>NO</th>
                      <th>TIPE</th>
                      <th>KODE PERIODE</th>
                     <th>TANGGAL</th>
                      <th>NIS</th>
                      <th>NAMA SANTRI</th>
                      
                         <th>JADWAL</th>
                            
                          
                      
                    </tr>
                  </thead>
          
              <tbody>
                                <?php $i=0;?>
                                                  
                      @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->tipe}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                         <td>{{$data->periode2->kode_periode}}</td>
                          <td>{{$data->tgl}}</td>
                          @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nis}}</td>
                           <td>{{$data->santri->nama_santri}}</td>
                           @endif
                             @if(!empty($data->jadwal->id_jadwal))
                           <td>{{$data->jadwal->kode_jadwal}}</td>
                           @endif
                        
                          
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