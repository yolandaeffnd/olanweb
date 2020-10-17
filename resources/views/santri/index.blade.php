@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA SANTRI</h4>
               
                <a href="{{route('santri.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
</div>
<div class="card-body">
<div class="table-wrapper" >
  <div class="md-card-content" style="overflow-x: auto;">
          <table class="table table-striped table-bordered" id="datatables">    

                     <!--  BAGIAN KEPALA TABEL -->
                      <thead>
                        <tr>
                          <th>No</th> 
                          <th>NIS</th>
                          <th>NAMA SANTRI</th>
                        <!--   <th>PANGGILAN</th> -->
                        
                          <th>TANGGAL LAHIR</th>
                          <th>JENIS KELAMIN</th>
                          <th>ALAMAT</th>
                         <!--  <th>PENDIDIKAN</th>
                          <th>KELAS</th>
                          <th>JENIS PEMBELAJARAN</th>
                          <th>NAMA AYAH</th>
                          <th>PEKERJAAN AYAH</th>
                          <th>NAMA IBU</th>
                          <th>PEKERJAAN IBU</th> -->
                          <th>NO HP</th>
                       <!--    <th>TUJUAN MASUK</th>
                          <th>TOTAL JUZ</th>
                          <th>USERNAME</th>
                          <th>PASSWORD</th>-->
                          <th>AKSI</th> 
                        </tr>
                      </thead>

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Santri::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->nis}}</td>
                          <td>{{$data->nama_santri}}</td>
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
                          <td>{{$data->no_hp}}</td>
                        <!--   <td>{{$data->tujuan_masuk}}</td>
                          <td>{{$data->totjuz}}</td>
                          <td>{{$data->username}}</td>
                          <td>{{$data->password}}</td> -->
                           <td>
                             <form action="{{route('santri.destroy', $data)}}" method="post"> 
            <a href="{{route('santri.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('santri.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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
</div>
</div>


@stop