@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA BEASISWA</h4>
                  </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">

    



  <form method="POST" action="{{ route('beasiswa.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis" value="{{$data->id_santri}}">
    </div>
 <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Pembayaran</label>
            <input name="jumlah_pembayaran_spp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jumlah" value="{{$data->jumlah_pembayaran_spp}}">
    </div>

     <div class="form-group">
          <label for="exampleInputEmail1">Bulan Berlaku</label>
            <input name="bulan_berlaku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bulan berlaku" value="{{$data->bulan_berlaku}}">
    </div>


<div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status Beasiswa</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_beasiswa" id="status_beasiswa" value="aktif" {{$data->status_beasiswa === "aktif" ? "checked" : ""}} > Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_beasiswa" id="status_beasiswa" value="tidak_aktif" {{$data->status_beasiswa === "tidak_aktif" ? "checked" : ""}}> Tidak Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>

<div class="form-group">
          <label  for="exampleInputEmail1">Kode Periode</label>
   

      <select name="id_periode" class="form-control">
        <option value="">Pilih Periode</option>
       <?php $periode2 = \App\Periode2::all();  ?>
        @foreach($periode2 as $periode2)
         <option 
                  value="{{$periode2->id_periode}}"
                  @if ($periode2->id_periode === $data->id_periode)
                  selected
                  @endif
                  >{{$periode2->kode_periode}}
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