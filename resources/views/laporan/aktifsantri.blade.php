@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA KEAKTIFAN SANTRI</h4>
      
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->
      <form method="POST" action="">
        {{ csrf_field() }}
  <div class="row">
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Santri</label>
            <select name="id_santri" class="form-control" id="id_santri">
        <option value="">Pilih NIS</option>
       <?php $santri = \App\Santri::all();  ?>
        @foreach($santri as $data)
        <option value="{{$data->id_santri}}">{{$data->nis}} </option>
        @endforeach
      </select>
    </div>  
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Halaqah Santri</label>
            <select name="id_halaqah" class="form-control" id="id_halaqah">
        <option value="">Pilih Halaqah</option>
       <?php $halaqah = \App\Halaqah::all();  ?>
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
    <table class="table table-striped table-bordered" id="datatables">    
            
                     <thead>
                    <tr>      
                      <th>NO</th>
                      <th>SURAT SELESAI</th>
                      <th>TOTAL JUZ</th>
                      <th>TOTAL PERTEMUAN</th>
                      <th>TOTAL HADIR</th>
                      <th>TOTAL SAKIT</th>
                      <th>TOTAL ALFA</th>
                      <th>STATUS KEAKTIFAN</th>
                      
                      
               
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          @if(!empty($data->surat_selesai))
                          <td>{{$data->surat_selesai}}</t>
                          @else
                          <td>{{$data->surat_selesai}}</t>
                          @endif


                          @if(!empty($data->total_juz))
                         <td>{{$data->total_juz}}</td>
                         @else
                         <td></td>
                         @endif


                          @if(!empty($data->total_pertemuan))
                         <td>{{$data->total_pertemuan}}</td>
                         @else
                         <td></td>
                         @endif

                         @if(!empty($data->total_pertemuan))
                         <td>{{$data->total_hadir}}</td>
                         @else
                         <td></td>
                         @endif

                         @if(!empty($data->total_pertemuan))
                         <td>{{$data->total_alfa}}</td>
                         @else
                         <td></td>
                         @endif
                         
                          @if(!empty($data->total_pertemuan))
                         <td>{{$data->total_sakit}}</td>
                         @else
                         <td></td>
                         @endif

                          @if(!empty($data->status_keaktifan))
                         <td>{{$data->status_keaktifan}}</td>
                         @else
                         <td></td>
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