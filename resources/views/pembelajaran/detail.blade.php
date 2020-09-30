@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA PEMBELAJARAN</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
                  </div>

    

<div class="card-body">

<div class="modal-footer">
        <a href="{{route('pembelajaran.index')}}" class="btn ml-lg-auto btn-rounded btn-success btn-dark btn-sm my-1 my-sm-0">KEMBALI</a>
    </div>
  <form method="" action="">
<div class="form-group">
          <label for="exampleInputEmail1">Pertemuan</label>
            <input name="id_pertemuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis" value="{{$data->id_pertemuan}}" readonly="true">
    </div>   

    <div class="form-group">
          <label for="exampleInputEmail1">Guru</label>
            <input name="id_pegawai" type="text" class="form-control" id="id_pegawai" aria-describedby="emailHelp" placeholder="guru" value="{{$data->id_pegawai}}" readonly="true">
    </div>
         
    <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis" value="{{$data->id_santri}}" readonly="true">
    </div>

      
      <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
          <input id="tgl" type="date" class="form-control" name="tgl" value="" value="{{$data->tgl}}" readonly="true">
    </div>
 
    <div class="form-group">
          <label for="exampleInputEmail1">Kehadiran</label>
            <input name="kehadiran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->kehadiran}}" readonly="true">
    </div>
   <div class="form-group">
          <label for="exampleInputEmail1">Juz Mulai</label>
            <input name="id_juz_mulai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->id_juz_mulai}}" readonly="true">
    </div>
    
    <div class="form-group">
          <label for="exampleInputEmail1">Surat Mulai</label>
            <input name="surat_mulai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->surat_mulai}}" readonly="true">
    </div> 

    
     <!-- <div class="form-group">
          <label for="exampleInputEmail1">juz mulai</label>
          <input id="juz_mulai" type="number" class="form-control" name="id_juz_mulai" value="" required>
    </div>

 -->
 <div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">Ayat Mulai</label>
            <input name="ayat_mulai" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ayat selesai" value="{{$data->ayat_mulai}}">
    </div>  
  </div>


    
<div class="form-group">
          <label for="exampleInputEmail1">Juz Selesai</label>
            <input name="id_juz_selesai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->id_juz_selesai}}" readonly="true">
    </div>

      
    <div class="form-group">
          <label for="exampleInputEmail1">Surat Selesai</label>
            <input name="surat_selesai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->surat_selesai}}" readonly="true">
    </div> 


      <div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">Ayat selesai</label>
            <input name="ayat_selesai" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ayat selesai" value="{{$data->ayat_selesai}}">
    </div>  
  </div>

<div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">Catatan</label>
            <input name="ctt" type="text" class="form-control" id="ctt" aria-describedby="emailHelp" placeholder="ctt" value="{{$data->ctt}}">
    </div>  
  </div>


 



  
</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop