@extends('backend.app')

 @section('content')
 <style>
      #image-preview{
        display:none;
        width : 250px;
        height : 300px;
        }
     </style>

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">TAMBAH DATA GURU</h4>
                  </div>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">
 <form method="POST" action="{{ route('guru.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
     
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Guru</label>
            <input name="nama_guru" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama guru">
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Nip</label>
            <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nip guru">
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
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Laki-laki" checked=""}} > Laki-laki <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="jk" id="jk" value="Perempuan" > Perempuan <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alamat" >
    </div>
   
  
    <div class="form-group">
          <label for="exampleInputEmail1">No Handphone</label>
            <input name="nohp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="no hp" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Lulusan</label>
            <input name="lulusan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lulusan">
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Masuk</label>
          <input id="tgl_masuk" type="date" class="form-control" name="tgl_masuk" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required>
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Hafalan</label>
            <input name="jml_hafalan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jumlah hafalan">
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Jabatan</label>
            <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jabatan">
    </div>
   
      <div class="form-group">
                                        <label for="foto" class="col-lg-4 control-label"><strong>Foto</strong></label>
                                        <div class="col-lg-6">
                                            <img id="preview" width="200" height="200"/>
                                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                                        </div>
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
@section('js')
<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
               
                return false
            })
        })
        </script>
    
</section>
@endsection