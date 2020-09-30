@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA JADWAL</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('jadwal.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
     <div class="form-group">
          <label for="exampleInputEmail1">Kode Jadwal</label>
            <input name="kode_jadwal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->kode_jadwal}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Jadwal</label>
            <input name="nama_jadwal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_jadwal}}">
    </div>
      <div class="form-group">
          
   

     

 <div class="form-group">
          <label  for="exampleInputEmail1">Kode Hari</label>
   

      <select name="id_hari" class="form-control">
        <option value="">Pilih Hari</option>
       <?php $hari = \App\Hari::all();  ?>
        @foreach($hari as $hari)
         <option 
                  value="{{$hari->id_hari}}"
                  @if ($hari->id_hari === $data->id_hari)
                  selected
                  @endif
                  >{{$hari->nama_hari}}
                </option>
        @endforeach
      </select>
    </div>


     <div class="form-group">
          <label  for="exampleInputEmail1">Kode Shift</label>
   

      <select name="id_shift" class="form-control">
        <option value="">Pilih Shift</option>
       <?php $shift = \App\Shift::all();  ?>
        @foreach($shift as $shift)
         <option 
                  value="{{$shift->id_shift}}"
                  @if ($shift->id_shift === $data->id_shift)
                  selected
                  @endif
                  >{{$shift->kode_shift}}
                </option>
        @endforeach
      </select>
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