@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA REGISTRASI</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="" action="">
        @csrf
  <div class="row">
     <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Tahun</label>
          <select name="tahun" class="form-control" id="tahun">
          <option value="" disabled selected>-Pilih Tahun-</option>
            
          <?php
            $thn_skr = date('Y');
            for ($j = $thn_skr; $j >= 2015; $j--) {
              ?>
                <option value="<?php echo $j ?>"><?php echo $j ?></option>
                <?php
            }
          ?>
        </select>
    </div>   
    <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Bulan</label>
            <select name="bulan" class="form-control" id="bulan">
                <option value="">-Pilih Bulan-</option>
                <option value="january">Januari</option>
                <option value="february">Februari</option>
                <option value="march">Maret</option>
                <option value="april">April</option>
                <option value="may">Mei</option>
                <option value="june">Juni</option>
                <option value="july">Juli</option>
                <option value="august">Agustus</option>
                <option value="september">September</option>
                <option value="october">Oktober</option>
                <option value="november">November</option>
                <option value="december">Desember</option>
            </select>
    </div>
    <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Status</label>
            <select name="status" class="form-control" id="status">
                <option value="">semua</option>
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
            </select>
    </div>
    
  </div>

    <div class="modal-footer">
     <!--  <a href="{{url('laporan/registrasi_view')}}" type="button" class="btn btn-danger btn-icon-text">
                            <i class="icon-cloud-upload btn-icon-prepend"></i> View</a> -->
        <button onclick="filterData()" type="button" class="btn btn-danger btn-icon-text"> View <i class="icon-eye btn-icon-append"></i>
                          </button>
        <button  onclick="filterPdf()" type="button" class="btn btn-info btn-icon-text"> PDF <i class="icon-printer btn-icon-append"></i>
                          </button>
                        
                        
    </div>
</div>


</form>
                  </div>
                </div>
<div class="row"> 
 <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
		<table class="table table-striped table-bordered" id="datatables">    
            
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
                          
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $x=0;?>      
                      @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$x}}.</b></td>
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
                        @else
                         <td><button class="btn btn-sm btn-rounded btn-danger">{{$data->status}}</button></td>
                        @endif
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
	</div>
  </div>
</div>
</div>

@stop 
@section('js')
<script type="text/javascript">
function filterData(){
      let year=document.getElementById('tahun').value
      let month=document.getElementById('bulan').value
      let state=document.getElementById('status').value
       window.location.href='registrasi_view?tahun='+year+'&bulan='+month+'&status='+state
    }
function filterPdf(){
      let year=document.getElementById('tahun').value
      let month=document.getElementById('bulan').value
      let state=document.getElementById('status').value
       window.location.href='registrasi_view/pdf?tahun='+year+'&bulan='+month+'&status='+state
    }
</script>
@endsection