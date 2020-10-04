@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA HALAQAH SANTRI</h4>
                <!-- <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn pull-right btn-success"><i class="fa fa-plus"></i>  Tambah Data </a></button> -->
              </div>
  <div class="card-body">
     <table class="table table-striped table-bordered" id="datatables">    

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>NIS SANTRI</th>
                      <th>KODE HALAQAH</th>
                      <th>AKSI</th>
                       
                     
                     
                      
            
                    <!--   <th>Aksi</th> -->
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\HalaqahSantri::all(); ?>
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
                          <td>
                        <form action="{{route('halaqahsantri.destroy', $data)}}" method="post"> 
            <a href="{{route('halaqahsantri.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a> 
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