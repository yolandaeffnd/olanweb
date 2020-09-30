@extends('template.app')

 @section('content')
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">DATA PERTEMUAN</h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn pull-right btn-success"><i class="fa fa-plus"></i>  Tambah Data </a></button>
  <table class="table table-striped table-bordered" id="datatables">    
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>HALAQAH</th>
                      <th>TANGGAL</th>
                      <th>MINGGU KE/HARI KE</th>
                      <th>PERTEMUAN Ke</th>
                      
                    
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Pertemuan::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                  
                          @if(!empty($data->halaqah->id_halaqah))
                         <td>{{$data->halaqah->kode_halaqah}}</td>
                         @endif
                          
                          <td>{{$data->tgl}}</td>
                          <td>{{$data->id_pembelajaran_periode}}</td>
                          <td>{{$data->id_pertemuan_kelas}}</td>
                         
                          
                       <!--    <td>{{$data->panggilan}}</td> -->
    
                        
                         
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




                             <form action="{{route('pertemuan.destroy', $data)}}" method="post"> 
            <a href="{{route('pertemuan.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
               
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
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel"><b>Tambah  Pertemuan</b></h3>
    </div>
    <div class="modal-body">

       <form method="POST" action="{{ route('pertemuan.store') }}">
        {{ csrf_field() }}
   <div class="form-group">
          <label  for="exampleInputEmail1">Kode Halaqah</label>
   

      <select name="id_halaqah" class="form-control">
        <option value="">Pilih Halaqah</option>
       <?php $halaqah = \App\Halaqah::all();  ?>
        @foreach($halaqah as $data)
        <option value="{{$data->id_halaqah}}">{{$data->kode_halaqah}} </option>
        @endforeach
      </select>
    </div> 
    <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
            <input name="tgl" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tanggal">
    </div>

  <div class="form-group">
          <label  for="exampleInputEmail1">Minggu ke / Hari ke</label>
   

      <select name="id_pembelajaran_periode" class="form-control">
        <option value="">Pilih Halaqah</option>
       <?php $pembelajaranperiode = \App\PembelajaranPeriode::all();  ?>
        @foreach($pembelajaranperiode as $data)
        <option value="{{$data->id_pembelajaran_periode}}">{{$data->kode_pembelajaran_periode}} </option>
        @endforeach
      </select>
    </div> 

 <!--  <div class="form-group">
          <label for="exampleInputEmail1">Pertemuan Ke</label>
            <input name="id_pertemuan_kelas" type="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pertemuan ke">
    </div>
        -->


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


</form>
</div>

</div>
</div>
</div>  


@stop 