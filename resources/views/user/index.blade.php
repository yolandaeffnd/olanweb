@extends('backend.app')
 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA USER</h4>

               
    <div class="card-body">
    <table class="table table-striped table-bordered" id="datatables">    

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>NIP</th>
                      <th>NAMA</th>
                      <th>LEVEL</th>
                      <th>GAMBAR</th>
                      
                       
                     
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\User::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->nip}}</td>
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->nama}}</td>
                          <td>{{$data->level}}</td>
                          <td>{{$data->gambar}}</td>
                          
                           
                         
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




                             <form action="{{route('user.destroy', $data)}}" method="post"> 
            <a href="{{route('user.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
            
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


@stop 