@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA HALAQAH</h4>
                  @if(Auth::user()->level == 'Admin' || Auth::user()->level == 'Wakbid Kesiswaan')
                  <a href="{{route('halaqah.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
                  @endif
                </div>
<div class="card-body">
    <table class="table table-striped table-bordered" id="datatables">    

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>KODE HALAQAH</th>
                      <th>JENIS KELAS</th>
                      <th>GURU</th>
                      <th>TEMPAT</th>
                      <th>PERIODE</th>
                      <th>JADWAL</th>
                      <th>JENIS KELAMIN</th>
                      
                       
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Halaqah::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->kode_halaqah}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->jeniskelas}}</td>
                           @if(!empty($data->guru->id_pegawai))
                           <td>{{$data->guru->nama_guru}}</td>
                           @endif
                          <td>{{$data->tempat->kode_tempat}}</td>
                           @if(!empty($data->periode2->id_periode))
                          <td>{{$data->periode2->kode_periode}}</td>
                          @endif
                           @if(!empty($data->jadwal->id_jadwal))
                          <td>{{$data->jadwal->kode_jadwal}}</td>
                          @endif
                           <td>{{$data->jk}}</td>
                   @if(Auth::user()->level == 'Admin' || Auth::user()->level == 'Wakbid Kesiswaan')
                           <td>

                             <form action="{{route('halaqah.destroy', $data)}}" method="post"> 
            <a href="{{route('halaqah.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
            
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa icon-trash"></i></button></form>  
                           </td>
                           @endif
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>


@endsection