@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PEMBAYARAN SPP</h4>
                      @if(Auth::user()->level != 'Wakbid Kesiswaan' && Auth::user()->level!='Wakbid Kurikulum' && Auth::user()->level!='Pimpinan' && Auth::user()->level!='Guru' && Auth::user()->level!='Admin')
                   <a href="{{route('pembayaran.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a>
                   @endif
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
                        <?php $i=0; ?>
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
            
             <a href="{{url('/pembayaran/index/pdf',$data)}}"  class="btn btn-warning btn-xs"><i class="fa   icon-printer" ></i></a> 
            <!--  <button method="post" onclick="filterPdf()" type="button" class="btn btn-info btn-icon-text" id="id_pembayaran" name="id_pembayaran" value={{$data->id_pembayaran}}> PDF <i class="icon-printer btn-icon-append" ></i>
                          </button> -->
             <a href="{{route('pembayaran.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>     
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
<script type="text/javascript">
function filterPdf(){
       let state=document.getElementById('id_pembayaran').value
       window.location.href='pembayaran/index/pdf?id_pembayaran='+state
    }
</script>


@endsection