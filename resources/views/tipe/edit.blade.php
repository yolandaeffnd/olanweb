@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA TIPE</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('tipe.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
     <div class="form-group">
          <label for="exampleInputEmail1">Kode Tipe</label>
            <input name="kode_tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode tipe" value="{{$data->kode_tipe}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Tipe</label>
            <input name="nama_tipe" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama tipe" value="{{$data->nama_tipe}}">
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