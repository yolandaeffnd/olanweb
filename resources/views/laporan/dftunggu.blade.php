@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PENEMPATAN</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="">
        {{ csrf_field() }}

  <div class="row">
    <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Status</label>
            <select name="status" class="form-control" id="status">
                <option value="">-Pilih Status-</option>
                <option value="menunggu">Menunggu</option>
                <option value="ditempatkan">Ditempatkan</option>
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
                      <th>PERIODE</th>
                       <th>JADWAL</th>
                      <th>NIS</th>
                      <th>HALAQAH</th>
                      <th>STATUS</th>
                      <th>TGL BERLAKU</th>
                     
                      
                         
      
                     
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          @if(!empty($data->periode2->id_periode))
                          <td>{{$data->periode2->kode_periode}}</td>
                          @endif
                           @if(!empty($data->jadwal->id_jadwal))
                         <td>{{$data->jadwal->kode_jadwal}}</td>
                         @endif
                          @if(!empty($data->santri->id_santri))
                         <td>{{$data->santri->nis}}</td>
                         @endif
                          @if(!empty($data->halaqah->id_halaqah))
                         <td>{{$data->halaqah->kode_halaqah}}</td>
                         @else
                          <td>---</td>
                         @endif
                      
                        @if($data->status=='menunggu')
                           <td><button class="btn btn-sm btn-rounded btn-danger">{{$data->status}}</button></td>
                        @elseif($data->status=='ditempatkan')
                         <td><button class="btn btn-sm btn-rounded btn-primary">{{$data->status}}</button></td>
                         @else
                          <td><button class="btn btn-sm btn-rounded btn-success">{{$data->status}}</button></td>
                        @endif
                         @if(!empty($data->tgl_mulai))
                         <td>{{$data->tgl_mulai}}</td>
                          @else
                          <td>---</td>
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
      let state=document.getElementById('status').value
     
       window.location.href='dftunggu_view?status='+state
    }
function filterPdf(){
       let state=document.getElementById('status').value
     
       window.location.href='dftunggu_view/pdf?status='+state
    }
</script>
@endsection