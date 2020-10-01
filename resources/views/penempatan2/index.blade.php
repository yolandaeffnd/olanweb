@extends('template.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PENEMPATAN SANTRI </h4>
                  </div>
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
                         @else
                          <td>---</td>
                         @endif
                      
                        @if($data->status=='menunggu')
                           <td><button class="btn btn-sm btn-rounded btn-danger">{{$data->status}}</button></td>
                        @elseif($data->status=='ditempatkan')
                         <td><button class="btn btn-sm btn-rounded btn-primary">{{$data->status}}</button></td>
                        @endif
                         @if(!empty($data->tgl_mulai))
                         <td>{{$data->tgl_mulai}}</td>
                          @else
                          <td>---</td>
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




                             <form action="{{route('penempatan2.destroy', $data)}}" method="post"> 
            <a href="{{route('penempatan2.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('penempatan2.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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