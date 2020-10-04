@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA REGISTRASI</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="">
        {{ csrf_field() }}

  <div class="row">
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Halaqah</label>
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
          <button onclick="filterData()" type="button" class="btn btn-danger btn-icon-text"> View <i class="icon-eye btn-icon-append"></i>
                          </button>
        <button  onclick="filterPdf()" type="button" class="btn btn-info btn-icon-text"> PDF <i class="icon-printer btn-icon-append"></i>
                          </button>


                        
                        
    </div>
</div>

   


</form>
                  </div>
               <div class="row"> 
 <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body">
    <table class="table table-striped table-bordered" id="datatables">    
            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>NIS SANTRI</th>
                      <th>KODE HALAQAH</th>
                     
                      
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
                       <!--    <td>{{$data->panggilan}}</td> -->
                           @if(!empty($data->halaqah->id_halaqah))
                          <td>{{$data->halaqah->kode_halaqah}}</td>
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
      let kelas=document.getElementById('id_halaqah').value
     
       window.location.href='halaqahsantri_view?id_halaqah='+kelas
    }
function filterPdf(){
      let kelas=document.getElementById('id_halaqah').value
     
       window.location.href='halaqahsantri_view/pdf?id_halaqah='+kelas
    }
</script>
@endsection