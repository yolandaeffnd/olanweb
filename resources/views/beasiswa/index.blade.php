@extends('backend.app')

 @section('content')
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">DATA BEASISWA</h4>
                @if(Auth::user()->level != 'Bendahara' && Auth::user()->level!='Wakbid Kurikulum' && Auth::user()->level!='Guru' && Auth::user()->level!='Admin' && Auth::user()->level!='Pimpinan')
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0"><i class="fa fa-plus"></i>  Tambah Data </a></button>
              </div>
              @endif
    <div class="card-body">
    <table class="table table-striped table-bordered" id="datatables">    
            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>NIS</th>
                      <th>JUMLAH PEMBAYARAN</th>
                      <th>BULAN BERLAKU</th>
                      <th>PERIODE BERLAKU</th>
                        @if(Auth::user()->level != 'Bendahara' && Auth::user()->level!='Wakbid Kurikulum' && Auth::user()->level!='Guru' && Auth::user()->level!='Admin' && Auth::user()->level!='Pimpinan')
                      <th>STATUS</th>
                      @endif
                         
                     
                     
                    
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Beasiswa::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                            @if(!empty($data->santri->id_santri))
                          <td>{{$data->santri->nama_santri}}</td>
                          @endif
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                          <td>{{$data->jumlah_pembayaran_spp}}</td>
                           <td>{{$data->bulan_berlaku}}</td>
                          <td>{{$data->id_periode}}</td>
                        
                          @if($data->status_beasiswa=='aktif')
                           <td><button class="btn btn-sm btn-rounded btn-primary">{{$data->status_beasiswa}}</button></td>
                          @elseif($data->status_beasiswa=='tidak_aktif')
                           <td><button class="btn btn-sm btn-rounded btn-danger">nonaktif</button></td>
                           @endif
                     
                       @if(Auth::user()->level != 'Bendahara' && Auth::user()->level!='Wakbid Kurikulum' && Auth::user()->level!='Guru' && Auth::user()->level!='Admin' && Auth::user()->level!='Pimpinan')
                         
                           <td>
                             <form action="{{route('beasiswa.destroy', $data)}}" method="post"> 
            <a href="{{route('beasiswa.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
             <a href="{{route('beasiswa.show', $data)}}" class="btn btn-warning btn-xs"><i class="fa   icon-magnifier"></i></a>   
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
              </div>

<!-- ===================================================================================================================================================================TAMBAH ISI DATA TEMPAT=========================================================

 -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel"><b>Tambah Data Beasiswa</b></h3>
    </div>
    <div class="modal-body">

       <form method="POST" action="{{ route('beasiswa.store') }}">
        {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputEmail1">Nis</label>
      <select name="id_santri" class="form-control">
        <option value="">Pilih Nis</option>
       <?php $santri = \App\Santri::all();  ?>
        @foreach($santri as $data)
        <option value="{{$data->id_santri}}">{{$data->nis}} </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Pembayaran</label>
            <input name="jumlah_pembayaran_spp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jumlah">
    </div>

     <div class="form-group">
          <label for="exampleInputEmail1">Bulan Berlaku</label>
            <input name="bulan_berlaku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bulan berlaku">
    </div>

       <div class="form-group">
          <label  for="exampleInputEmail1">Periode</label>
      <select name="id_periode" class="form-control">
        <option value="">Pilih Periode</option>
       <?php $periode2 = \App\Periode2::all();  ?>
        @foreach($periode2 as $data)
        <option value="{{$data->id_periode}}">{{$data->kode_periode}} </option>
        @endforeach
      </select>
    </div>

    <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status Beasiswa</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_beasiswa" id="status_beasiswa" value="aktif" checked=""}} > Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_beasiswa" id="status_beasiswa" value="tidak_aktif" > Tidak Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
    

    

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


</form>
</div>





@stop 