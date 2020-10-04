@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA GURU</h4>
                  </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">

 <form method="POST" action="{{ route('guru.update',$data) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
       
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Guru</label>
            <input name="nama_guru" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_guru}}">
    </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
            <input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_lahir}}" />
    </div>
   <!--  <div class="form-group">
          <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input name="jk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jk}}">
    </div> -->


    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Laki-laki" {{$data->jk === "Laki-laki" ? "checked" : ""}} > Laki-laki <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Perempuan" {{$data->jk === "Perempuan" ? "checked" : ""}}> Perempuan <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>


    <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->alamat}}">
    </div>
   
    <div class="form-group">
          <label for="exampleInputEmail1">No Handphone</label>
            <input name="nohp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nohp}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->email}}">
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Lulusan</label>
            <input name="lulusan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->lulusan}}">
          </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masuk</label>
            <input name="tgl_masuk" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_masuk}}" />
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Hafalan</label>
            <input name="jml_hafalan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jml_hafalan}}" >
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Jabatan</label>
            <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jabatan}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->username}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->password}}">
    </div>
    




    <div class="modal-footer">
        <a href="{{ route('guru.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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