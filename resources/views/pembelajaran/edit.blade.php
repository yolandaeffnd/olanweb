@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA PEMBELAJARAN</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
                  </div>

    

<div class="card-body">

  <form method="POST" action="{{ route('pembelajaran.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
<div class="form-group">
          <label for="exampleInputEmail1">Pertemuan</label>
            <input name="id_pertemuan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis" value="{{$data->id_pertemuan}}" readonly="true">
    </div>   

    <div class="form-group">
          <label for="exampleInputEmail1">Guru</label>
            <input name="id_pegawai" type="text" class="form-control" id="id_pegawai" aria-describedby="emailHelp" placeholder="guru" value="{{$data->guru->nama_guru}}" readonly="true">
    </div>
         
<div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis" value="{{$data->santri->nis}}" readonly="true">
    </div>

      
      <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
          <input id="tgl" type="date" class="form-control" name="tgl" value="{{$data->tgl}}" readonly="true">
    </div>
 


    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kehadiran</label>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="kehadiran" id="kehadiran1" value="hadir" {{$data->kehadiran === "hadir" ? "checked" : ""}}> hadir <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="kehadiran" id="kehadiran2" value="sakit" {{$data->kehadiran === "sakit" ? "checked" : ""}}> sakit <i class="input-helper"></i></label>
                              </div>
                            </div>
                             <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="kehadiran" id="kehadiran3" value="alfa" {{$data->kehadiran === "alfa" ? "checked" : ""}}> alfa <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>

     

     <div class="form-group">
          <label  for="exampleInputEmail1">Juz Mulai</label>
      <select name="id_juz_mulai" class="form-control">
        <option value="">Pilih Juz</option>
       <?php $juz = \App\Juz::all();  ?>
        @foreach($juz as $juzz)
         <option 
                  value="{{$juzz->id_juz}}"
                  @if ($juzz->id_juz === $data->id_juz_mulai)
                  selected
                  @endif
                  >{{$juzz->id_juz}}
                </option>
        @endforeach
      </select>
    </div>

     <!-- <div class="form-group">
          <label for="exampleInputEmail1">juz mulai</label>
          <input id="juz_mulai" type="number" class="form-control" name="id_juz_mulai" value="" required>
    </div>

 -->

   <div class="form-group">
          <label  for="exampleInputEmail1">Surat Mulai</label>
      <select name="surat_mulai" class="form-control">
        <option value="">Pilih Surat Mulai</option>
       <?php $surat = \App\Surat::all();  ?>
        @foreach($surat as $suratt)
         <option 
                  value="{{$suratt->nama_surat}}"
                  @if ($suratt->nama_surat === $data->surat_mulai)
                  selected
                  @endif
                  >{{$suratt->nama_surat}}
                </option>
        @endforeach
      </select>
    </div>

    
 <div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">Ayat selesai</label>
          <input name="ayat_mulai" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ayat selesai" value="{{$data->ayat_mulai}}">
    </div>
  </div>

       <div class="form-group">
          <label  for="exampleInputEmail1">Juz Mulai</label>
      <select name="id_juz_selesai" class="form-control">
        <option value="">Pilih Juz</option>
       <?php $juz = \App\Juz::all();  ?>
        @foreach($juz as $juzz)
         <option 
                  value="{{$juzz->id_juz_selesai}}"
                  @if ($juzz->id_juz_selesai === $data->id_juz_selesai)
                  selected
                  @endif
                  >{{$juzz->id_juz_selesai}}
                </option>
        @endforeach
      </select>
    </div>
    <!--  <div class="form-group">
          <label for="exampleInputEmail1">juz selesai</label>
          <input id="juz_selesai" type="number" class="form-control" name="id_juz_selesai" value="" required>
    </div> -->


    <div class="form-group">
          <label  for="exampleInputEmail1">Surat Selesai</label>
      <select name="surat_selesai" class="form-control">
        <option value="">Pilih Surat Mulai</option>
       <?php $surat = \App\Surat::all();  ?>
        @foreach($surat as $suratt)
         <option 
                  value="{{$suratt->nama_surat}}"
                  @if ($suratt->nama_surat === $data->surat_selesai)
                  selected
                  @endif
                  >{{$suratt->nama_surat}}
                </option>
        @endforeach
      </select>
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


 



    <div class="modal-footer">
    <a href="{{ route('pembelajaran.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </div>


</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop