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
		 <center><p><span style="font-size: 22px;  font-weight: bold;">DAFTAR PERKEMBANGAN PEMBELAJARAN</span></p>
		 </center><br><br>
         <table width="100%">
<tr style="font-size: 18px; font-weight: bold">
<td width="20%">Nis / Nama</td><td width="50%"> : <?php echo  $nis?> / <?php echo $nama?></td>
</tr>


<br>
</table>
<table style="width: 100%" border="1" border-collapse: collapse; borderspacing="0" cellpadding="2">
           <thead>
                    <tr>      
                      <th>NO</th>
                      <th>PERTEMUAN</th>
                
                     
                      <th>TANGGAL</th>
                      <th>JUZ MULAI</th>
                      <th>JUZ SELESAI</th>
                      <th>TOTAL JUZ</th>
                      
                      
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->id_pertemuan}}</t>
                         
                         <td>{{$data->tgl}}</td>
                         <td>{{$data->id_juz_mulai}}</td>
                         <td>{{$data->id_juz_selesai}}</td>
                         <td>{{$data->total_juz}}</td>
                        
                          
                          
                          
                      
                         
                          
                        </tr>
                        @endforeach
                      </tbody>
  </table>
  <br><br>
 <table>
		<tr style="font-size: 16px; font-weight: bold">
@foreach($c1 as $r)
<td width="10%">Total Juz Keseluruhan</td><td>:</td><td>{{$r->total_juz}}</td>
  </tr>
  <tr style="font-size: 16px; font-weight: bold">
<td width="10%">Total Pertemuan</td><td>:</td><td>{{$r->total_pertemuan}}</td>
</tr>
<tr style="font-size: 16px; font-weight: bold">
<td width="10%">Total Hadir</td><td>:</td><td>{{$r->total_hadir}}</td>
</tr>
<tr style="font-size: 16px; font-weight: bold">
<td width="10%">Total Sakit/Izin</td><td>:</td><td>{{$r->total_sakit}}</td>
<tr style="font-size: 16px; font-weight: bold">
<td width="10%">Total Alfa</td><td>:</td><td>{{$r->total_alfa}}</td>
</tr>
@endforeach
		
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