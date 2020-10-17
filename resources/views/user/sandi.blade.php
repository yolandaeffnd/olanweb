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
<a href="{{url('/beranda')}}"><button type="submit" class="btn btn-secondary">kembali</button></a>
  <form method="POST" action="{{ url('/sandiPassword') }}" >
        {{ csrf_field() }}
        {{ method_field('put') }}
    
                        <div class="form-group row">
        <label for="old_password" class="col-md-2 col-form-label">{{ __('Sandi Sekarang') }}</label>
        <div class="col-md-6">
            <input id="old_password" name="old_password" type="password" class="form-control" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="new_password" class="col-md-2 col-form-label">{{ __('Sandi Baru') }}</label>
        <div class="col-md-6">
            <input id="new_password" name="new_password" type="password" class="form-control" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="password_confirm" class="col-md-2 col-form-label">{{ __('Sandi Password') }}</label>

        <div class="col-md-6">
            <input id="password_confirm" name="password_confirm" type="password" class="form-control" required
                   autofocus>
        </div>
    </div>

    <div class="modal-footer">
     
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
