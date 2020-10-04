@extends('backend.app')

 @section('content')
<div class="card">
   <div class="card-header">               
                    <h4 class="card-title">DATA JADWAL</h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0"><i class="fa fa-plus"></i>  Tambah Data </a></button>
              </div>
  <div class="card-body">
    <table class="table table-striped table-bordered" id="datatables">    

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>KODE JADWAL</th>
                      <th>NAMA JADWAL</th>
                     <th>KODE HARI</th>
                      <th>KODE SHIFT</th>
                       
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Jadwal::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->kode_jadwal}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->nama_jadwal}}</td>
                           @if(!empty($data->hari->id_hari))
                           <td>{{$data->hari->nama_hari}}</td>
                           @endif
                            @if(!empty($data->shift->id_shift))
                          <td>{{$data->shift->waktu}}</td>
                          @endif
                        <!--   <td>{{$data->pendidikan}}</td>
                          <td>{{$data->kelas}}</td>
                          <td>{{$data->jespem}}</td>
                          <td>{{$data->nama_ayah}}</td>
                          <td>{{$data->pekerjaan_ayah}}</td>
                          <td>{{$data->nama_ibu}}</td>
                          <td>{{$data->pekerjaan_ibu}}</td> -->

                
                        <!--   <td>{{$data->tujuan_masuk}}</td>
                          <td>{{$data->totjuz}}</td>
                          <td>{{$data->username}}</td>
                          <td>{{$data->password}}</td> -->
                           <td>




                             <form action="{{route('jadwal.destroy', $data)}}" method="post"> 
            <a href="{{route('jadwal.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('jadwal.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa icon-trash"></i></button></form>  
                           </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

<!-- ===================================================================================================================================================================TAMBAH ISI DATA TEMPAT=========================================================

 -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel"><b>Tambah Data Jadwal</b></h3>
    </div>
    <div class="modal-body">

       <form method="POST" action="{{ route('jadwal.store') }}">
        {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputEmail1">Kode Jadwal</label>
            <input name="kode_jadwal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode jadwal">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Jadwal</label>
            <input name="nama_jadwal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama jadwal">
    </div>
      <div class="form-group">
          <label  for="exampleInputEmail1">Kode Hari</label>
   

      <select name="id_hari" class="form-control">
        <option value="">Pilih Hari</option>
       <?php $hari = \App\Hari::all();  ?>
        @foreach($hari as $data)
        <option value="{{$data->id_hari}}">{{$data->kode_hari}} </option>
        @endforeach
      </select>
    </div>

     <div class="form-group">
          <label  for="exampleInputEmail1">Kode Shift</label>
   

      <select name="id_shift" class="form-control">
        <option value="">Pilih Shift</option>
       <?php $shift = \App\Shift::all();  ?>
        @foreach($shift as $data)
        <option value="{{$data->id_shift}}">{{$data->kode_shift}} </option>
        @endforeach
      </select>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


</form>
</div>

</div>
</div>
</div>  


@stop 