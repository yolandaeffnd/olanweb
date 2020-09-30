@extends('template.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA PERIODE</h4>
                  </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    <div class="card-body">



  <form method="POST" action="{{ route('periode.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}
     <div class="form-group">
          <label for="exampleInputEmail1">Kode periode</label>
            <input name="kode_periode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="kode periode">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Semester</label>
            <input name="semester" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="semester" value="{{$data->semester}}">
    </div>

  <div class="form-group">
          <label for="exampleInputEmail1">Tahun akademk</label>
            <input name="tahun_akademik" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tahun akademik" value="{{$data->tahun_akademik}}">
    </div>

  <div class="form-group">
          <label for="exampleInputEmail1">Tahun</label>
            <input name="tahun" type="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tahun" value="{{$data->tahun}}">
    </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Mulai</label>
          <input id="tgl_mulai" type="date" class="form-control" name="tgl_mulai" value="{{$data->tgl_mulai}}" required >
    </div>

   <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="Aktif" {{$data->status === "Aktif" ? "checked" : ""}} > Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="Tidak Aktif" {{$data->status === "Tidak Aktif" ? "checked" : ""}}> Tidak Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>


</form>
</div>

</div>
</div>
</div>  


                </div>
            </div>


@stop