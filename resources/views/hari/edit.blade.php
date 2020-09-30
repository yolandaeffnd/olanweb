@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA HARI</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('hari.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
     <div class="form-group">
          <label for="exampleInputEmail1">Kode Hari</label>
            <input name="kode_hari" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode hari" value="{{$data->kode_hari}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Hari</label>
            <input name="nama_hari" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama hari" value="{{$data->nama_hari}}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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