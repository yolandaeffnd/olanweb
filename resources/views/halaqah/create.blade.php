@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">TAMBAH DATA HALAQAH</h4>
                  </div>
<div class="card-body">

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->

 <form method="POST" action="{{ route('halaqah.store') }}">
        {{ csrf_field() }}
     
          <div class="form-group">
          <label for="exampleInputEmail1">Kode Halaqah</label>
            <input name="kode_halaqah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode halaqah">
    </div>   


    <div class="form-group">
          <label  for="exampleInputEmail1">Jenis Kelas</label>
  
      <select name="jeniskelas" class="form-control">
        <option value="">Pilih Kelas</option>
        <option value="HR">Harian Reguler</option>
        <option value="HP">Harian Privat</option>
        
      </select>
    </div>
  
      <div class="form-group">
          <label  for="exampleInputEmail1">Guru</label>
   

      <select name="id_pegawai" class="form-control">
        <option value="">Pilih Guru</option>
       <?php $guru = \App\Guru::all();  ?>
        @foreach($guru as $data)
        <option value="{{$data->id_pegawai}}">{{$data->nama_guru}} </option>
        @endforeach
      </select>
    </div>

     <div class="form-group">
          <label  for="exampleInputEmail1">Tempat</label>
      <select name="id_tempat" class="form-control">
        <option value="">Pilih Tempat</option>
       <?php $tempat = \App\Tempat::all();  ?>
        @foreach($tempat as $data)
        <option value="{{$data->id_tempat}}">{{$data->kode_tempat}} </option>
        @endforeach
      </select>
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

 <div class="form-group">
 <label  for="exampleInputEmail1">Jadwal</label>
    <select name="id_jadwal" class="form-control">
        <option value="">Pilih Jadwal</option>
       <?php $jadwal = \App\Jadwal::all();  ?>
        @foreach($jadwal as $data)
        <option value="{{$data->id_jadwal}}">{{$data->kode_jadwal}} </option>
        @endforeach
      </select>
    </div>


 <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="laki-laki" checked=""> Laki-laki <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="perempuan"> Perempuan <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>

    <div class="modal-footer">
    <a href="{{ route('halaqah.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop