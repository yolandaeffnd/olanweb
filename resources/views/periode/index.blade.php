@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA TEMPAT</h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn pull-right btn-success"><i class="fa fa-plus"></i>  Tambah Data </a></button>
              </div>
  <div class="card-body">
   <table class="table table-striped table-bordered" id="datatables">  
            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>SEMESTER</th>
                      <th>BULAN</th>
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Periode::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->semester}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->bulan}}</td>
                         
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




                             <form action="{{route('periode.destroy', $data)}}" method="post"> 
            <a href="{{route('periode.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('periode.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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
        <h3 class="modal-title" id="staticBackdropLabel"><b>Tambah Data Periode</b></h3>
    </div>
    <div class="modal-body">

       <form method="POST" action="{{ route('periode.store') }}">
        {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputEmail1">Semester</label>
            <input name="semester" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="semester">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Bulan</label>
            <input name="bulan" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bulan">
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