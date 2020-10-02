@extends('template.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA SHIFT</h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0"><i class="fa fa-plus"></i>  Tambah Data </a></button>
              </div>
              <div class="card-body">
     <table class="table table-striped table-bordered" id="datatables">    

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>KODE SHIFT</th>
                      <th>WAKTU</th>
                     <th>JAM MULAI</th>
                      <th>JAM SELESAI</th>
                       
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Shift::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->kode_shift}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->waktu}}</td>
                             <td>{{$data->jam_mulai}}</td>
                                 <td>{{$data->jam_selesai}}</td>
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




                             <form action="{{route('shift.destroy', $data)}}" method="post"> 
            <a href="{{route('shift.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('shift.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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
        <h3 class="modal-title" id="staticBackdropLabel"><b>Tambah Data Tipe</b></h3>
    </div>
    <div class="modal-body">

       <form method="POST" action="{{ route('shift.store') }}">
        {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputEmail1">Kode Shift</label>
            <input name="kode_shift" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode shift">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Waktu</label>
            <input name="waktu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="waktu">
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Jam Mulai</label>
            <input name="jam_mulai" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jam mulai">
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Jam Selesai</label>
            <input name="jam_selesai" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jam selesai">
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