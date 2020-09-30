@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA PERTEMUAN</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
                  </div>

    

<div class="card-body">

  <form method="POST" action="{{ route('pertemuan.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
    <div class="form-group">
          <label  for="exampleInputEmail1">Kode Halaqah</label>
   

      <select name="id_halaqah" class="form-control">
        <option value="">Pilih Hari</option>
       <?php $halaqah = \App\Halaqah::all();  ?>
        @foreach($halaqah as $halaqah)
         <option 
                  value="{{$halaqah->id_halaqah}}"
                  @if ($halaqah->id_halaqah === $data->id_halaqah)
                  selected
                  @endif
                  >{{$halaqah->kode_halaqah}}
                </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
            <input name="tgl" type="date" value="{{$data->tgl}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tanggal">
    </div>

   <div class="form-group">
          <label  for="exampleInputEmail1">Minggu ke / Hari ke</label>
   

      <select name="id_pembelajaran_periode" class="form-control">
        <option value="">Pilih minggu ke/hari ke</option>
       <?php $pperiode = \App\PembelajaranPeriode::all();  ?>
        @foreach($pperiode as $pperiode)
         <option 
                  value="{{$pperiode->id_pembelajaran_periode}}"
                  @if ($pperiode->id_pembelajaran_periode === $data->id_pembelajaran_periode)
                  selected
                  @endif
                  >{{$pperiode->kode_pembelajaran_periode}}
                </option>
        @endforeach
      </select>
    </div>

  <div class="form-group">
          <label for="exampleInputEmail1">Pertemuan Ke</label>
            <input name="id_pertemuan_kelas"  value="{{$data->id_pertemuan_kelas}}"type="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pertemuan ke">
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