@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA GURU</h4>
                <a href="{{route('guru.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
              </div>
  <div class="card-body">
    <table class="table table-striped  table-bordered" id="datatables">    
            
                    <thead>
                    <tr>
                    <th>NO</th>      
                      <th>NAMA GURU</th>
                      <th>TANGGAL LAHIR</th>
                      <th>JENIS KELAMIN</th>
                      <th>ALAMAT</th>
                      <th>JABATAN</th>
                      <!-- th>Username</th>
                      <th>Password</th> -->
                      <th>NOHP</th>
                      <th>AKSI</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Guru::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->nama_guru}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->tgl_lahir}}</td>
                          <td>{{$data->jk}}</td>
                          <td>{{$data->alamat}}</td>
                        <!--   <td>{{$data->pendidikan}}</td>
                          <td>{{$data->kelas}}</td>
                          <td>{{$data->jespem}}</td>
                          <td>{{$data->nama_ayah}}</td>
                          <td>{{$data->pekerjaan_ayah}}</td>
                          <td>{{$data->nama_ibu}}</td>
                          <td>{{$data->pekerjaan_ibu}}</td> -->
                          <td>{{$data->jabatan}}</td>
                          <td>{{$data->nohp}}</td>
                        <!--   <td>{{$data->tujuan_masuk}}</td>
                          <td>{{$data->totjuz}}</td>
                          <td>{{$data->username}}</td>
                          <td>{{$data->password}}</td> -->
                           <td>




                             <form action="{{route('guru.destroy', $data)}}" method="POST"> 
            <a href="{{route('guru.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('guru.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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


@endsection