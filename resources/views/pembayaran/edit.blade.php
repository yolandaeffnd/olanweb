@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA BEASISWA</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('pembayaran.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}

    <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nis" value="{{$data->id_santri}}">
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
    
     <!--  <div class="form-group">
          <label for="exampleInputEmail1">Bulan Berlaku</label>
            <input name="bulan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bulan" value="{{$data->bulan}}">
    </div>
 -->
    
       <div class="form-group">
          <label  for="exampleInputEmail1">Bulan Berlaku</label>
      <select name="bulan" class="form-control">
        <option value="">Pilih Bulan</option>
       <?php $periode = \App\Periode::all();  ?>
        @foreach($periode as $periode)
        <option value="{{$periode->bulan}}"
                @if($periode->bulan===$data->bulan)selected
                @endif>{{$periode->bulan}} </option>
        @endforeach
      </select>
    </div>

<div class="form-group">
          <label for="exampleInputEmail1">Tanggal Pembayaran</label>
            <input name="tgl_pembayaran" id="tgl" type="date" class="form-control"  aria-describedby="emailHelp"  value="{{$data->tgl_pembayaran}}">
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
                                  <input type="radio" class="form-check-input" name="status" id="status" value="lunas" {{$data->status === "lunas" ? "checked" : ""}}> Lunas <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="belum_lunas" {{$data->status === "belum_lunas" ? "checked" : ""}}> Belum Lunas <i class="input-helper"></i></label>
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
