@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA REGISTRASI</h4>
          
                         <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
                       </div>


<div class="card-body">
     <table class="table table-striped table-bordered" id="datatables">    
            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>TIPE</th>
                      <th>KODE PERIODE</th>
                     <th>TANGGAL</th>
                      <th>NIS</th>
                      <th>NAMA SANTRI</th>
                      
                         <th>JADWAL</th>
                            <th>STATUS</th>
                             <!--   <th>STATUS PEMBAYARAN</th>
                                  <th>JUMLAH PEMBAYARAN</th>
                                     <th>TANGGAL PEMBAYARAN</th> -->

                       
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Registrasi::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                           @if($data->tipe=='Baru')
                           <td><button class="btn btn-sm btn-rounded btn-primary">{{$data->tipe}}</button></td>
                        @else
                         <td><button class="btn btn-sm btn-rounded btn-warning">{{$data->tipe}}</button></td>
                        @endif
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                         <td>{{$data->periode2->kode_periode}}</td>
                          <td>{{$data->tgl}}</td>
                          @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nis}}</td>
                           <td>{{$data->santri->nama_santri}}</td>
                           @endif
                             @if(!empty($data->jadwal->id_jadwal))
                           <td>{{$data->jadwal->kode_jadwal}}</td>
                           @endif
                          @if($data->status=='aktif')
                           <td><button class="btn btn-sm btn-rounded btn-success">{{$data->status}}</button></td>
                        @else
                         <td><button class="btn btn-sm btn-rounded btn-danger">{{$data->status}}</button></td>
                        @endif
                    <!--       <td>{{$data->status_pembayaran}}</td>
                          <td>{{$data->jumlah_pembayaran}}</td>
                          <td>{{$data->tgl_pembayaran}}</td> -->
                       
                        
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




                             <form action="{{route('registrasi.destroy', $data)}}" method="post"> 
            <a href="{{route('registrasi.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
            
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


@stop 