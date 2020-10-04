@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PEMBAYARAN SPP</h4>
                   <a href="{{route('pembayaran.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
                 </div>
<div class="card-body">
     <table class="table table-striped table-bordered" id="datatables">    

            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>NIS</th>
                       <th>PERIODE BERLAKU</th>
                      <th>JUMLAH PEMBAYARAN</th>
                      <th>BULAN</th>
                      <th>TANGGAL PEMABAYARAN</th>
                      <th>STATUS</th>
                      
                         
      
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Pembayaran::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nis}}</td>
                          @endif
                          @if(!empty($data->periode2->id_periode))
                          <td>{{$data->periode2->kode_periode}}</td>
                          @endif
                          <td>{{$data->spp}}</td>
                          <td>{{$data->bulan}}</td>
                          <td>{{$data->tgl_pembayaran}}</td>
                          <td>{{$data->status}}</td>
                          

                          
                        
                           <td>




                             <form action="{{route('pembayaran.destroy', $data)}}" method="post"> 
            <a href="{{route('pembayaran.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('pembayaran.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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
@section('js')


@endsection