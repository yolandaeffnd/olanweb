@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA HALAQAH</h4>
                  </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


     <div class="card-body">



  <form method="POST" action="{{ route('halaqah.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
      <div class="form-group">
          <label for="exampleInputEmail1">Kode Halaqah</label>
            <input name="kode_halaqah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode halaqah"  value="{{$data->kode_halaqah}}">
    </div>   


    <div class="form-group">
          <label  for="exampleInputEmail1">Jenis Kelas</label>
  
      <select name="jeniskelas" class="form-control">
      <!--   <option value="">Pilih Kelas</option> -->
        <option value="HR"  {{$data->jk === "HR" ? "selected" : ""}}>Harian Reguler</option>
        <option value="HP" {{$data->jk === "HP" ? "selected" : ""}}>Harian Privat</option>
        
      </select>
    </div>
  
      

     


<div class="form-group">
          <label  for="exampleInputEmail1">Guru</label>
   

      <select name="id_pegawai" class="form-control">
        <option value="">Pilih Guru</option>
       <?php $guru = \App\Guru::all();  ?>
        @foreach($guru as $guru)
         <option 
                  value="{{$guru->id_pegawai}}"
                  @if ($guru->id_pegawai === $data->id_pegawai)
                  selected
                  @endif
                  >{{$guru->nama_guru}}
                </option>
        @endforeach
      </select>
    </div>






   <div class="form-group">
          <label  for="exampleInputEmail1">Tempat</label>
   

      <select name="id_tempat" class="form-control">
        <option value="">Pilih Tempat</option>
       <?php $tempat = \App\Tempat::all();  ?>
        @foreach($tempat as $tempat)
         <option 
                  value="{{$tempat->id_tempat}}"
                  @if ($tempat->id_tempat === $data->id_tempat)
                  selected
                  @endif
                  >{{$tempat->kode_tempat}}
                </option>
        @endforeach
      </select>
    </div>


<div class="form-group">
          <label  for="exampleInputEmail1">Kode Periode</label>
   

      <select name="id_periode" class="form-control">
        <option value="">Pilih Periode</option>
       <?php $periode2 = \App\Periode2::all();  ?>
        @foreach($periode2 as $periode2)
         <option 
                  value="{{$periode2->id_periode}}"
                  @if ($periode2->id_periode === $data->id_periode)
                  selected
                  @endif
                  >{{$periode2->kode_periode}}
                </option>
        @endforeach
      </select>
    </div>
    

 

 <div class="form-group">
 <label  for="exampleInputEmail1">Jadwal</label>
    <select name="id_jadwal" class="form-control">
        <option value="">Pilih Jadwal</option>
       <?php $jadwal = \App\Jadwal::all();  ?>
        @foreach($jadwal as $jadwal)
        <option value="{{$jadwal->id_jadwal}}"
                  @if ($jadwal->id_jadwal === $data->id_jadwal)
                  selected
                  @endif
                  >{{$jadwal->kode_jadwal}}</option>
        @endforeach
      </select>
    </div>


  <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Laki-laki" {{$data->jk === "laki-laki" ? "checked" : ""}}> Laki-laki <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Perempuan" {{$data->jk === "perempuan" ? "checked" : ""}}> Perempuan <i class="input-helper"></i></label>
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