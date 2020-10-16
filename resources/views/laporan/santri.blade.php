@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA SANTRI</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="">
        {{ csrf_field() }}

  <div class="row">
     <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Periode</label>
          <select name="id_periode" class="form-control" id="id_periode">
        <option value="">Pilih Periode</option>
       <?php $periode2 = \App\Periode2::all();  ?>
        @foreach($periode2 as $data)
        <option value="{{$data->id_periode}}">{{$data->tahun_akademik}} </option>
        @endforeach
      </select>
    </div>   
    <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select name="jk" class="form-control" id="jk">
                <option value="">-Pilih Jenis Kelamin-</option>
                <option value="semua">Semua</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
          
            </select>
    </div>

     <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Status Santri</label>
            <select name="status" class="form-control" id="status">
                <option value="">-Pilih Status-</option>
                <option value="1">Beasiswa</option>
                <option value="2">Semua</option>
          
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
                          <th>No</th> 
                          <th>NIS</th>
                          <th>NAMA SANTRI</th> 
                         <!--  <th>TANGGAL LAHIR</th>
                          <th>JENIS KELAMIN</th> -->
                          <th>ALAMAT</th>
                          <th>PENDIDIKAN</th>
                          <th>KELAS</th>
                          <th>NAMA AYAH</th>
                          <th>PEKERJAAN AYAH</th>
                          <th>NAMA IBU</th>
                          <th>PEKERJAAN IBU</th>
                          <th>NO HP</th>
                    
                         
                        </tr>
                      </thead>

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->nis}}</td>
                          <td>{{$data->nama_santri}}</td>
                         <!--  <td>{{$data->tgl_lahir}}</td>
                          <td>{{$data->jk}}</td> -->
                          <td>{{$data->alamat}}</td>
                          <td>{{$data->pendidikan}}</td>
                          <td>{{$data->kelas}}</td>
                          <td>{{$data->nama_ayah}}</td>
                          <td>{{$data->pekerjaan_ayah}}</td>
                          <td>{{$data->nama_ibu}}</td>
                          <td>{{$data->pekerjaan_ibu}}</td>
                          <td>{{$data->no_hp}}</td>
                       
                          
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
      let periode=document.getElementById('id_periode').value
      let gender=document.getElementById('jk').value
      let state=document.getElementById('status').value
       window.location.href='santri_view?id_periode='+periode+'&jk='+gender+'&status='+state
    }

function filterPdf(){
      let periode=document.getElementById('id_periode').value
      let gender=document.getElementById('jk').value
      let state=document.getElementById('status').value
       window.location.href='santri_view/pdf?id_periode='+periode+'&jk='+gender+'&status='+state
    }

</script>
@endsection