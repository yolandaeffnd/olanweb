@extends('backend.app')
@section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PEMBELAJARAN</h4>
          
                         <a href="{{route('pembelajaran.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
                       </div>


<div class="card-body">
     <table class="table table-striped table-bordered" id="datatables">  

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>PERTEMUAN</th>
                       <th>GURU</th>
                      <th>SANTRI</th>
                      <th>TANGGAL</th>
                      <th>JUZ MULAI</th>
                      <th>JUZ SELESAI</th>
                      <th>TOTAL JUZ</th>
                      
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Pembelajaran::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->id_pertemuan}}</td>
                        @if(!empty($data->guru->id_pegawai))
                         <td>{{$data->guru->nama_guru}}</td>
                         @endif
                        
                        @if(!empty($data->santri->id_santri))
                         <td>{{$data->santri->nis}}</td>
                         @endif
                         
                         <td>{{$data->tgl}}</td>
                         <td>{{$data->id_juz_mulai}}</td>
                         <td>{{$data->id_juz_selesai}}</td>
                         <td>{{$data->total_juz}}</td>
                        
                          
                          
                          
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




                             <form action="{{route('pembelajaran.destroy', $data)}}" method="post"> 
            <a href="{{route('pembelajaran.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('pembelajaran.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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


@stop 