@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA TEMPAT</h4>
                    </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">

    



  <form method="POST" action="{{ route('tempat.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
    <div class="form-group">
          <label for="exampleInputEmail1">Kode Tempat</label>
            <input name="kode_tempat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="gedung" value="{{$data->gedung}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Gedung</label>
            <input name="gedung" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="gedung" value="{{$data->gedung}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Ruangan</label>
            <input name="ruangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ruangan"value="{{$data->ruangan}}" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tingkat</label>
            <input name="tingkat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tingkat" value="{{$data->tingkat}}">
    </div>


    <div class="modal-footer">
       <a href="{{ route('tempat.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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