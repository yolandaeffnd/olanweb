@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA REGISTRASI</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="{{url('laporan/registrasi_view')}}">
        {{ csrf_field() }}

  <div class="row">
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Tahun</label>
           <select name="tahun" class="form-control" id="tahun">
          <option value="tahun" disabled selected>-Pilih Tahun-</option>
          <?php
            $thn_skr = date('Y');
            for ($i = $thn_skr; $i >= 2015; $i--) {
              ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php
            }
          ?>
        </select>
    </div>   
    <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Bulan</label>
            <select name="bulan" class="form-control" id="bulan">
                <option value="">-Pilih Bulan-</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
    </div>
    
  </div>

    <div class="modal-footer">
        <a href="{{url('laporan/registrasi_view')}}"><button type="button" class="btn btn-danger btn-icon-text"  onclick="filterData()">
                            <i class="icon-cloud-upload btn-icon-prepend"></i> View </button></a>
        <button type="button" class="btn btn-info btn-icon-text"> PDF <i class="icon-printer btn-icon-append"></i>
                          </button>


                        
                        
    </div>
</div>

   


</form>
                  </div>
                </div>
                
        <div class="col-md-12 grid-margin">
	<div class="card-body">
		<table class="table table-striped table-bordered" id="table">    
            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>TIPE</th>
                      <th>KODE PERIODE</th>
                     <th>TANGGAL</th>
                      <th>NIS</th>
                      <th>NAMA SANTRI</th>
                      
                         <th>JADWAL</th>
                            <th>STATUS</th>
                             <!--   <th>STATUS PEMBAYARAN</th>
                                  <th>JUMLAH PEMBAYARAN</th>
                                     <th>TANGGAL PEMBAYARAN</th> -->

                       
                     
                     
                      
           
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
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
                          @if($data->status=='aktif')
                           <td><button class="btn btn-sm btn-rounded btn-success">{{$data->status}}</button></td>
                        @elseif($data->status=='ditempatkan')
                         <td><button class="btn btn-sm btn-rounded btn-danger">{{$data->status}}</button></td>
                        @endif
                   
                         
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
	</div>
  </div>
@stop 
@section('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

});
function filterData(){
      let tahun=document.getElementById('tahun').value
      let bulan=document.getElementById('bulan').value
      window.location.href='/olanweb/public/laporan/registrasi_view?tahun='+tahun+'&bulan='+bulan
    }
</script>
@stop