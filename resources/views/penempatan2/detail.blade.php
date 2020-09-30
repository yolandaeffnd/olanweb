@extends('template.app')

 @section('content')

<div class="card">
                 <div class="card-header">
                    <h4 class="card-title">DATA PENEMPATAN</h4>
                  </div>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


      <div class="card-body">
<div class="modal-footer">
        <a href="{{route('penempatan2.index')}}" class="btn ml-lg-auto btn-rounded btn-success btn-dark btn-sm my-1 my-sm-0">KEMBALI</a>
    </div>


  <form method="" action="">
        {{ csrf_field() }}
            
            <div class="form-group">
          <label for="exampleInputEmail1">Kode Periode</label>
            <input name="id_periode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->periode2->tahun_akademik}}" readonly="true">
    </div>
    

 <div class="form-group">
          <label for="exampleInputEmail1">Jadwal</label>
            <input name="id_jadwal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->jadwal->kode_jadwal}}" readonly="true">
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->santri->nis}}" readonly="true">
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Halaqah</label>
            <input name="id_halaqah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  
            @if(!empty($data->halaqah->kode_halaqah))
                  value="{{$data->halaqah->kode_halaqah}}"
                  @else
                   value="{{$data->id_halaqah}}"
                   @endif readonly="true">
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Minggu Ke / Hari Ke</label>
            <input name="id_pembelajaran_periode" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  @if(!empty($data->halaqah->kode_halaqah))
                  value="{{$data->periode->kode_pembelajaran_periode}}"
                  @else
                   value="{{$data->id_pembelajaran_periode}}"
                   @endif readonly="true">
    </div>
   
 

   


     <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Registrasi</label>
            <input name="tgl_regis" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_regis}}" readonly="true">
    </div>
   <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Berlaku</label>
            <input name="tgl_mulai" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_mulai}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Satus Registrasi</label>
            <input name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->status}}" readonly="true">
    </div>
   


   





    



     



</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop