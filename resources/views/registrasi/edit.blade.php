@extends('backend.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
  
  $("#belum_bayar").hide();
    $("#bayar").hide();

    if(document.getElementById('status_pembayaran1').checked== true){
        $("#belum_bayar").hide();
        document.getElementById('status_pembayaran1').value="bayar";   
        $("#bayar").show();
    }else if(document.getElementById('status_pembayaran2').checked== true){
        $("#belum_bayar").show();
         $("#bayar").hide();
         document.getElementById('status_pembayaran2').value="belum_bayar";   
    }

  $("#status_pembayaran1").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#belum_bayar").hide();
     document.getElementById('status_pembayaran1').value="bayar";   
     $("#bayar").show();
    });

    $("#status_pembayaran2").change(function(){ // Ketika user mengganti atau memilih data provinsi
     $("#belum_bayar").show();
     $("#bayar").hide();
     document.getElementById('status_pembayaran2').value="belum_bayar";   
    });
});
</script>
 @section('content')

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EDIT DATA JADWAL</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->


    



  <form method="POST" action="{{ route('registrasi.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}


  

   
 
   <!--STATUS REGISTRASI---!>

    <!-- <div class="form-group"> -->
         <!--  <label for="exampleInputEmail1">Satus</label> -->
          <!--   <input name="status" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alamat" value="aktif">
    </div>
    -->

     <div class="form-group">
          <label for="exampleInputEmail1">ID Registrasi</label>
            <input name="id_registrasi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->id_registrasi}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="nis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->santri->nis}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Nama Santri</label>
            <input name="nama_santri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->santri->nama_santri}}">
    </div>
     <div class="form-group">
          <!-- <label for="exampleInputEmail1">NIS</label> -->
            <input name="id_santri" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->id_santri}}">
    </div>
  
  
   <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status Pembayaran</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_pembayaran" id="status_pembayaran1" value="bayar" {{$data->status_pembayaran === "bayar" ? "checked" : ""}} > Bayar <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status_pembayaran" id="status_pembayaran2" value="belum_bayar" {{$data->status_pembayaran === "belum_bayar" ? "checked" : ""}}> Belum Bayar <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
<section id="bayar">
    <div class="form-group">
          <label for="exampleInputEmail1">Jumlah Pembayaran</label>
            <input name="jumlah_pembayaran" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->jumlah_pembayaran}}">
    </div>
    
     <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Pembayaran</label>
          <input id="tgl_pembayaran" type="date" class="form-control" name="tgl_pembayaran" value="{{$data->tgl_pembayaran}}" required>
    </div>

     <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="bayar" {{$data->status === "aktif" ? "checked" : ""}} > Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="tidak aktif" {{$data->status === "tida aktif" ? "checked" : ""}}> Tidak Aktif <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
  </section>


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