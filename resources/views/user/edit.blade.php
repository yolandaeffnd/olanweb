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
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA USER</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->

  <form method="POST" action="{{ route('user.update', $data) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
     <div class="form-group">
          <label for="exampleInputEmail1">NIP</label>
            <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="{{$data->nip}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">NAMA</label>
            <input name="nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="" value="{{$data->nama}}">
    </div>
     <div class="form-group">
                              <label for="foto" class="col-lg-4 control-label"><strong>Foto</strong></label>
                                        <div class="col-lg-6">
                                <img width="200" height="200" @if($data->gambar) src="{{ asset('assets/images/profil/'.$data->gambar) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar" >
                            </div>
                                    </div>
     @if(Auth::user()->level == 'Admin')
    <div class="form-group">
          <label for="exampleInputEmail1">LEVEL</label>
             <select name="level" class="form-control" id="level">
                        <option value="">-Pilih Level-</option>
                        <option value="Admin" {{$data->level === "Admin" ? "selected" : ""}}>Admin</option>
                        <option value="Pimpinan" {{$data->level === "Pimpinan" ? "selected" : ""}}>Pimpinan</option>
                        <option value="Wakbid Kesiswaan" {{$data->level === "Wakbid Kesiswaan" ? "selected" : ""}}>Wakbid Kesiswaan</option>
                        <option value="Wakbid Kurikulum" {{$data->level === "Wakbid Kurikulum" ? "selected" : ""}}>Wakbid Kurikulum</option>
                        <option value="Bendahara" {{$data->level === "Bendahara" ? "selected" : ""}}>Bendahara</option>
                        <option value="Guru" {{$data->level === "Guru" ? "selected" : ""}}>Guru</option>
                    </select>
    </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Sandi Baru</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Sandi</label>
                            <div class="col-md-6">
                                <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
                                <span id='message'></span>
                            </div>
                        </div>
                        @endif

    <div class="modal-footer">
      <a href="{{url('/beranda')}}"><button type="submit" class="btn btn-secondary">Cancel</button></a>
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