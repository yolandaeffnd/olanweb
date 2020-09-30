@extends('template.app')

 @section('content')
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">DATA PENEMPATAN SANTRI </h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn pull-right btn-success"><i class="fa fa-plus"></i>  Tambah Data </a></button>
   <table class="table table-striped table-bordered" id="datatables">  

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>PERIODE</th>
                       <th>JADWAL</th>
                      <th>NIS</th>
                      <th>HALAQAH</th>
                      <th>PEMBELAJARAN PERIODE</th>
                      <th>STATUS</th>
                      <th>TGL REGISTRASI</th>
                      <th>TGL BERLAKU</th>
                      <th>STATUS REGISTRASI</th>
                      
                         
      
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Penempatan::all(); ?>
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
                         @endif
                        @if(!empty($data->id_pembelajaran_periode))
                         <td>{{$data->id_pembelajaran_periode}}</td>
                         @else
                         <td> </td>
                         @endif
                         <td>{{$data->status}}</td>
                         <td>{{$data->tgl_regis}}</td>
                         <td>{{$data->tgl_mulai}}</td>
                         <td>{{$data->status_registrasi}}</td>

                          
                          
                          
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




                             <form action="{{route('penempatan.destroy', $data)}}" method="post"> 
            <a href="{{route('penempatan.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('penempatan.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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