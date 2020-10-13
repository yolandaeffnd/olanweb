@extends('backend.app')
@section('js')
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
    $.noConflict();
    $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    }
                });
  $("#hadir").hide();
  

    if(document.getElementById('kehadiran1').checked== true){
        $("#hadir").show();
    }else if(document.getElementById('kehadiran2').checked== true){
        $("#hadir").hide();

     }else if(document.getElementById('kehadiran3').checked== true){
        $("#hadir").hide();
     }
       
    

 $("#kehadiran1").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#hadir").hide();
     document.getElementById('kehadiran1').value="hadir";   
     $("#hadir").show();
    });

    $("#kehadiran2").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#hadir").hide();
     document.getElementById('kehadiran2').value="sakit";   
    });

    $("#kehadiran3").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#hadir").hide();
     document.getElementById('kehadiran3').value="alfa";   
    });

   
});

</script>
 @endsection
 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">TAMBAH DATA PEMBELAJARAN</h4>


                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->

 <form method="POST" action="{{route('pembelajaran.store')}}">
          @csrf
      <div class="form-group">
          <label  for="exampleInputEmail1">Pertemuan</label>
      <select name="id_pertemuan" id="id_pertemuan" class="form-control" >
        <option value="">Pilih Pertemuan</option>
       <?php $pertemuan = \App\Pertemuan::all();  ?>
        @foreach($pertemuan as $data)
        <option value="{{$data->id_pertemuan}}">{{$data->id_pertemuan}} </option>
        @endforeach
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

  <?php 
    $nip = Auth::user()->nip;
    $guru = \App\Guru::select('id_pegawai')->where('nip',$nip)->first();

    $getGuru= $guru->id_pegawai;

    $halaqah = \App\Halaqah::select('id_halaqah')->where('id_pegawai',$guru)->first();

    $getHalaqah=$halaqah->id_halaqah; 

    $santri = DB::table('santri')
          ->leftjoin('h_halaqah_santri','santri.id_santri','=','h_halaqah_santri.id_santri')
          ->select('santri.*','h_halaqah_santri.id_halaqah')
          ->where('h_halaqah_santri.id_halaqah',$halaqah)->get();

          
     ?>
     <div class="form-group">
          <label  for="exampleInputEmail1">Santri</label>
      <select name="id_santri" class="form-control">
        <option value="">Pilih Santri</option>
        @foreach($santri as $data)
        <option value="{{$data->id_santri}}">{{$data->nama_santri}} </option>
        @endforeach
      </select>
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
          <input id="tgl_pertemuan" type="date" class="form-control" name="tgl" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required>
    </div>
 


    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kehadiran</label>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="kehadiran" id="kehadiran1" value="hadir"> hadir <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="kehadiran" id="kehadiran2" value="sakit"> sakit <i class="input-helper"></i></label>
                              </div>
                            </div>
                             <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="kehadiran" id="kehadiran3" value="alfa"> alfa <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>


<section id="hadir">
     <div class="form-group">
          <label  for="exampleInputEmail1">Juz Mulai</label>
      <select name="id_juz_mulai" class="form-control">
        <option value="">Pilih Juz</option>
       <?php $juz = \App\Juz::all();  ?>
        @foreach($juz as $data)
        <option value="{{$data->id_juz}}">{{$data->id_juz}} </option>
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
        <option value="">Pilih Surat</option>
       <?php $surat = \App\Surat::all();  ?>
        @foreach($surat as $data)
        <option value="{{$data->nama_surat}}">{{$data->nama_surat}} </option>
        @endforeach
      </select>
    </div>

 <div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">ayat selesai</label>
          <input name="ayat_mulai" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ayat selesai">
    </div>
  </div>

      <div class="form-group">
          <label  for="exampleInputEmail1">Juz Selesai</label>
      <select name="id_juz_selesai" class="form-control">
        <option value="">Pilih Juz</option>
       <?php $juz = \App\Juz::all();  ?>
        @foreach($juz as $data)
        <option value="{{$data->id_juz}}">{{$data->id_juz}} </option>
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
        <option value="">Pilih Surat</option>
       <?php $surat = \App\Surat::all();  ?>
        @foreach($surat as $data)
        <option value="{{$data->nama_surat}}">{{$data->nama_surat}} </option>
        @endforeach
      </select>
    </div>

      <div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">ayat selesai</label>
            <input name="ayat_selesai" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ayat selesai">
    </div>  
  </div>

  <div class="form-group">
    <div class="form-group">
          <label for="exampleInputEmail1">Catatan</label>
            <input name="ctt" type="text" class="form-control" id="ctt" aria-describedby="emailHelp" placeholder="ctt" >
    </div>  
  </div>

  
    </section> 



 



    <div class="modal-footer">
    <a href="{{ route('pembelajaran.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary" onclick="kurang()">Submit</button>
    </div>


</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop
