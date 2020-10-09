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
                    <h4 class="card-title">DATA SANTRI</h4>
                      </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">
  <div class="modal-footer">
        <a href="{{route('santri.index')}}" class="btn ml-lg-auto btn-rounded btn-success btn-dark btn-sm my-1 my-sm-0">KEMBALI</a>
    </div>
 <form method="" action="" enctype="multipart/form-data">
       @csrf
        {{ method_field('put') }}
        <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="nis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nis}}">
    </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Santri</label>
            <input name="nama_santri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_santri}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Panggilan</label>
            <input name="panggilan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->panggilan}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
            <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tempat_lahir}}">
    </div>
   <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
            <input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_lahir}}" />
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
          <label for="exampleInputEmail1">Pendidikan</label>
            <input name="pendidikan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->pendidikan}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Kelas</label>
            <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->kelas}}" readonly="true">
    </div>
    <!-- <div class="form-group">
          <label for="exampleInputEmail1">Jenis Pembelajaran</label>
            <input name="jespem" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jespem}}">
    </div> -->



    <div class="form-group">
          <label for="exampleInputEmail1">Nama Ayah</label>
            <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_ayah}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Pekerjaan Ayah</label>
            <input name="pekerjaan_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->pekerjaan_ayah}}" readonly="true">
    </div>
    
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Ibu</label>
            <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_ibu}}" readonly="true">
    </div>
  <div class="form-group">
          <label for="exampleInputEmail1">Pekerjaan Ibu</label>
            <input name="pekerjaan_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->pekerjaan_ibu}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">No Handphone</label>
            <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->no_hp}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tujuan Masuk</label>
            <input name="tujuan_masuk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->tujuan_masuk}}" readonly="true">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Total Juz</label>
            <input name="totjuz" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->totjuz}}" readonly="true">
    </div>
      <div class="form-group">
              <label for="foto" class="col-lg-4 control-label"><strong>Foto</strong></label>
                          <div class="col-lg-6">
                                <img width="200" height="200" @if($data->gambar) src="{{ asset('assets/images/santri/'.$data->gambar) }}" @endif />
                              
                            </div>
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
