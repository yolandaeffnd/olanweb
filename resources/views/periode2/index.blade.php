@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PERIODE</h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0"><i class="fa fa-plus"></i>  Tambah Data </a></button>
              </div>

                <div class="card-body">
  <table class="table table-striped table-bordered" id="datatables">  
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>KODE PERIODE</th>
                      <th>SEMESTER</th>
                      <th>TAHUN AKADEMIK</th>
                      <th>TAHUN</th>
                      <th>TANGGAL MULAI</th>
                      <th>AKTIF</th>
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Periode2::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->kode_periode}}</td>
                          <td>{{$data->semester}}</td>
                          <td>{{$data->tahun_akademik}}</td>
                          <td>{{$data->tahun}}</td>
                          <td>{{$data->tgl_mulai}}</td>
                          <td>{{$data->status}}</td>
                          
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                        
                         
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




                             <form action="{{route('periode2.destroy', $data)}}" method="post"> 
            <a href="{{route('periode2.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('periode2.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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

       <form method="POST" action="{{ route('periode2.store') }}">
        {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputEmail1">Kode periode</label>
            <input name="kode_periode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode periode">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Semester</label>
            <input name="semester" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="semester">
    </div>

  <div class="form-group">
          <label for="exampleInputEmail1">Tahun akademk</label>
            <input name="tahun_akademik" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tahun akademik">
    </div>

  <div class="form-group">
          <label for="exampleInputEmail1">Tahun</label>
            <input name="tahun" type="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tahun">
    </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Mulai</label>
          <input id="tgl_mulai" type="date" class="form-control" name="tgl_mulai" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required>
    </div>

   <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="Aktif" checked="" > Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="Tidak Aktif"> Tidak Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
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