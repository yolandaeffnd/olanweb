@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">TAMBAH DATA SANTRI</h4>
                </div>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">
 <form method="POST" action="{{ route('santri.store') }}">
        <!-- {{ csrf_field() }} -->
        @csrf
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

  <div class="form-group row">
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
   


    <div class="modal-footer">
       <a href="{{ route('santri.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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



