@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PERKEMBANGAN PEMBELAJARAN</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="">
        {{ csrf_field() }}

        <?php 
  if(Auth::user()->level == 'Guru')
  {
    $nip = Auth::user()->nip;
    $guru = \App\Guru::select('id_pegawai')->where('nip',$nip)->first();

    $getGuru= $guru->id_pegawai;

    $halaqah = \App\Halaqah::where('id_pegawai',$getGuru)->get();
    $result = \App\Halaqah::select('id_halaqah')->where('id_pegawai',$getGuru)->first();
    $gtgr =$result->id_halaqah;

    foreach($halaqah as $hq)
    {
      $getHalaqah=$hq->id_halaqah; 
    }
    $santri2 = \App\Santri::
          leftjoin('h_halaqah_santri','santri.id_santri','=','h_halaqah_santri.id_santri')
          ->select('santri.*','h_halaqah_santri.id_halaqah')
          ->where('h_halaqah_santri.id_halaqah',$gtgr)->get();
  }else{
    $santri2 = \App\Santri::all();
    $halaqah = \App\Halaqah::all(); 

  }
    

          
     ?>

  <div class="row">
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Santri</label>
            <select name="id_santri" class="form-control" id="id_santri">
        <option value="">Pilih NIS</option>
        @foreach($santri2 as $data)
        <option value="{{$data->id_santri}}">{{$data->nis}} </option>
        @endforeach
      </select>
    </div>  
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Halaqah Santri</label>
            <select name="id_halaqah" class="form-control" id="id_halaqah">
        <option value="">Pilih Halaqah</option>
     
        @foreach($halaqah as $data)
        <option value="{{$data->id_halaqah}}">{{$data->kode_halaqah}} </option>
        @endforeach
      </select>
    </div>  
    
  </div>

    <div class="modal-footer">
        <div class="modal-footer">
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
        <div class="table-wrapper" >
  <div class="md-card-content" style="overflow-x: auto;">
    <table class="table table-striped table-bordered" id="datatables">    
            
                     <thead>
                    <tr>      
                      <th>NO</th>
                      <th>PERTEMUAN</th>
                      <th>NAMA</th>
                     
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
                         
                         <td>{{$data->santri->nama_santri}}</t>
                          
                         <td>{{$data->tgl}}</td>
                         <td>{{$data->id_juz_mulai}}</td>
                         <td>{{$data->id_juz_selesai}}</td>
                         <td>{{$data->total_juz}}</td>
                        
                          
                          
                          
                      
                         
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table> 
  </div>
  </div>
</div>
</div>
</div>
</div>
@stop 
@section('js')
<script type="text/javascript">
function filterData(){
      let student=document.getElementById('id_santri').value
      let kelas=document.getElementById('id_halaqah').value
     
       window.location.href='pembelajaran_view?id_santri='+student+'&id_halaqah='+kelas
    }
function filterPdf(){
      let student=document.getElementById('id_santri').value
      let kelas=document.getElementById('id_halaqah').value
     
       window.location.href='pembelajaran_view/pdf?id_santri='+student+'&id_halaqah='+kelas
    }
</script>
@endsection