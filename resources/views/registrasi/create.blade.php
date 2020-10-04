@extends('backend.app')
@section('js')
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
  
  $("#Lama").hide();
    $("#Baru").hide();

    if(document.getElementById('tipe1').checked== true){
        $("#Lama").hide();
        document.getElementById('tipe1').value="Baru";   
        $("#Baru").show();
    }else if(document.getElementById('tipe2').checked== true){
        $("#Lama").show();
         $("#Baru").hide();
         document.getElementById('tipe2').value="Lama";   
    }

  $("#tipe1").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#Lama").hide();
     document.getElementById('tipe1').value="Baru";   
     $("#Baru").show();
    });

    $("#tipe2").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#Lama").show();
     $("#Baru").hide();
     document.getElementById('tipe2').value="Lama";   
    });
});

</script>
 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">TAMBAH DATA REGISTRASI</h4>


                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->

  <form method="POST" action="{{ route('registrasi.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
     

      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="tipe" id="tipe1" value="Baru" }} > Baru <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="tipe" id="tipe2" value="Lama"> Lama <i class="input-helper"></i></label>
                              </div>
                            </div>
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
          <label for="exampleInputEmail1">Tanggal Registrasi</label>
          <input id="tgl" type="date" class="form-control" name="tgl" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">

        </div>


        
   
 <section id="Lama">
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
</section>

   
 <div class="form-group">
          <label for="exampleInputEmail1">Jadwal</label>
      <select name="id_jadwal" class="form-control">
        <option value="">Pilih Jadwal</option>
       <?php $jadwal = \App\Jadwal::all();  ?>
        @foreach($jadwal as $data)
        <option value="{{$data->id_jadwal}}">{{$data->kode_jadwal}} </option>
        @endforeach
      </select>
    </div>

   

    <div class="form-group">
         <!--  <label for="exampleInputEmail1">Satus</label> -->
            <input name="status" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alamat" value="aktif">
    </div>
   
  
   <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status Pembayaran</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_pembayaran" id="status_pembayaran" value="bayar" checked=""}} > Bayar <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_pembayaran" id="status_pembayaran" value="belum_bayar" > Belum Bayar <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Pembayaran</label>
            <input name="jumlah_pembayaran" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="50000">
    </div>
    
     <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Pembayaran</label>
          <input id="tgl_pembayaran" type="date" class="form-control" name="tgl_pembayaran" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required>
    </div>


<section id="Baru">
           <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="nis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis">
    </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Santri</label>
            <input name="nama_santri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama santri">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Panggilan</label>
            <input name="panggilan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="panggilan">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
            <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tempat lahir">
    </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required>
    </div>
    <!-- <div class="form-group">
          <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input name="jk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jenis kelamin">
    </div> -->

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Laki-laki" checked=""> Laki-laki <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Perempuan"> Perempuan <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
                      






    <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alamat" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Pendidikan</label>
            <input name="pendidikan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pendidikan">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Kelas</label>
            <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kelas">
    </div>
   <!--  <div class="form-group">
          <label for="exampleInputEmail1">Jenis Pembelajaran</label>
            <input name="jespem" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jenis pembelajaran" >
    </div> -->

  <!-- <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Pembelajaran</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jespem" id="jespem" value="Iqro" checked=""> Iqro <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jespem" id="jespem" value="Alquran"> Alquran <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
 -->

    <div class="form-group">
          <label for="exampleInputEmail1">Nama Ayah</label>
            <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama ayah">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Pekerjaan Ayah</label>
            <input name="pekerjaan_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pekerjaan ayah">
    </div>
    
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Ibu</label>
            <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama ibu">
    </div>
  <div class="form-group">
          <label for="exampleInputEmail1">Pekerjaan Ibu</label>
            <input name="pekerjaan_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pekerjaan ayah">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">No Handphone</label>
            <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="no hp" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tujuan Masuk</label>
            <input name="tujuan_masuk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tujuan masuk" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Total Juz</label>
            <input name="totjuz" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="total juz">
    </div>
   <!--  <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="password">
    </div> -->
   </section>



    <div class="modal-footer">
    <a href="{{ route('registrasi.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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