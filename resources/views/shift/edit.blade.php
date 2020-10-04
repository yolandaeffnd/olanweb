@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA TIPE</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('shift.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
   <div class="form-group">
          <label for="exampleInputEmail1">Kode Shift</label>
            <input name="kode_shift" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode shift" value="{{$data->kode_shift}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Waktu</label>
            <input name="waktu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="waktu" value="{{$data->waktu}}">
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Jam Mulai</label>
            <input name="jam_mulai" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jam mulai" value="{{$data->jam_mulai}}">
    </div>

      <div class="form-group">
          <label for="exampleInputEmail1">Jam Selesai</label>
            <input name="jam_selesai" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jam selesai" value="{{$data->jam_selesai}}">
    </div>

    <div class="modal-footer">
    <a href="{{ route('shift.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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