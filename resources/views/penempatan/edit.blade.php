@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA PENEMPATAN</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('penempatan.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="form-group">
          <label for="exampleInputEmail1">Kode Periode</label>
            <input name="id_periode" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->id_periode}}">
    </div>

 <div class="form-group">
          <label for="exampleInputEmail1">Jadwal</label>
            <input name="id_jadwal" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->id_jadwal}}">
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->id_santri}}">
    </div>
    <div class="form-group">
          <label  for="exampleInputEmail1">HALAQAH</label>
   

      <select name="id_halaqah" class="form-control">
        <option value="">Pilih Halaqah</option>
       <?php $halaqah = \App\Halaqah::all();  ?>
        @foreach($halaqah as $halaqah)
         <option 
                  value="{{$halaqah->id_halaqah}}"
                  @if ($halaqah->id_halaqah === $data->id_halaqah)
                  selected
                  @endif
                  >{{$id_halaqah->id_halaqah}}
                </option>
        @endforeach
      </select>
    </div>
     <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Registrasi</label>
            <input name="tgl_regis" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_regis}}">
    </div>
   <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Berlaku</label>
            <input name="tgl_mulai" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_mulai}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Satus Registrasi</label>
            <input name="status" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->status}}">
    </div>
   

 <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Pembayaran</label>
            <input name="spp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jumlah" value="{{$data->spp}}">
    </div>

   


<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status Pembayaran</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="bayar" {{$data->status_pembayaran === "bayar" ? "checked" : ""}} > Bayar <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status_pembayaran2" value="status" {{$data->status_pembayaran === "belum_bayar" ? "checked" : ""}}> Belum Bayar <i class="input-helper"></i></label>
                              </div>
                            </div>
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