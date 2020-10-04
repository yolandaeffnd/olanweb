@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PEMBAYARAN</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="">
        {{ csrf_field() }}

  <div class="row">
    <div class="form-group col-md-6">
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
    <div class="form-group col-md-6">
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
  </div>
   <div class="modal-footer">
          <button onclick="filterData()" type="button" class="btn btn-danger btn-icon-text"> View <i class="icon-eye btn-icon-append"></i>
                          </button>
        <button  onclick="filterPdf()" type="button" class="btn btn-info btn-icon-text"> PDF <i class="icon-printer btn-icon-append"></i>
                          </button>

                        
                        
    </div>

  <div class="row"> 
 <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
    <table class="table table-striped table-bordered" id="datatables">    
            
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
                          <td>{{$data->santri->nama_santri}}</td>
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
  </div>
  </div>
</div>
</div>


   
</div>

   


</form>
                  </div>
                </div>


@stop 
@section('js')
<script type="text/javascript">
function filterData(){
      let year=document.getElementById('tahun').value
      let month=document.getElementById('bulan').value
       window.location.href='pembayaran_view?tahun='+year+'&bulan='+month
    }
function filterPdf(){
      let year=document.getElementById('tahun').value
      let month=document.getElementById('bulan').value
       window.location.href='pembayaran_view/pdf?tahun='+year+'&bulan='+month
    }
</script>
@endsection  