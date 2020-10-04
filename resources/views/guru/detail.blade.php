@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA GURU</h4>
                  </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">
 <div class="modal-footer">
        <a href="{{route('guru.index')}}" class="btn ml-lg-auto btn-rounded btn-success btn-dark btn-sm my-1 my-sm-0">KEMBALI</a>
    </div>
 <form method="" action="" enctype="">
       
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Guru</label>
            <input name="nama_guru" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_guru}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
            <input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_lahir}}" readonly="true">
    </div>
   <!--  <div class="form-group">
          <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input name="jk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jk}}">
    </div> -->

    <div class="form-group">
          <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input name="jk" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->jk}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->alamat}}" readonly="true">
    </div>
   
    <div class="form-group">
          <label for="exampleInputEmail1">No Handphone</label>
            <input name="nohp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nohp}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->email}}" readonly="true">
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Lulusan</label>
            <input name="lulusan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->lulusan}}" readonly="true">
          </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masuk</label>
            <input name="tgl_masuk" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_masuk}}" readonly="true">
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Hafalan</label>
            <input name="jml_hafalan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jml_hafalan}}" readonly="true">
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Jabatan</label>
            <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jabatan}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->username}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->password}}" readonly="true">
    </div>
    




    


</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop