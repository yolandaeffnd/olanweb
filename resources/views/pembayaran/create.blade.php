@extends('template.app')
@section('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $.ajaxSetup({
                    headers: {
         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
    $("#id_santri").on("change", function(){ 
        const id_santri=$(this).val();
            $.ajax({
                    type: "POST",
                    url:`/get_fields/${id_santri}`,
                    data: {
                        id_santri : $(this).val(),
                        jumlah_pembayaran_spp : $(this).val(),
                        status_beasiswa : $(this).val()
                        }, 
                    dataType: "JSON",
                    success: function(response){
                    console.log(response)
                    $("#loading").hide(); 
                    if(value=response.status_beasiswa=='aktif')
                    {
                        document.getElementById('spp').value=response.jumlah_pembayaran_spp;
                    }
                    else
                    {
                      document.getElementById('spp').value='0';
                    }
                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    { 
                        console.log(xhr);
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
                    }
            });
    });

   

});

  </script>
  @endsection
 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">TAMBAH DATA PEMBAYARAN</h4>
                  </div>


                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
 <div class="card-body">
  <form method="POST" action="{{route('pembayaran.store')}}" enctype="multipart/form-data" >
    
       @csrf
    <div class="form-group">
          <label for="exampleInputEmail1">Nis</label>
      <select name="id_santri"  id="id_santri" class="form-control">
        <option value="">Pilih Nis</option>
       <?php $santri = \App\Santri::all();  ?>
        @foreach($santri as $data)
        <option value="{{$data->id_santri}}">{{$data->nama_santri}} </option>
        @endforeach
      </select>
    </div>



       <div class="form-group">
          <label  for="exampleInputEmail1">Periode</label>
      <select name="id_periode" class="form-control">
        <option value="">Pilih Periode</option>
       <?php $periode2 = \App\Periode2::all();  ?>
        @foreach($periode2 as $data)
        <option value="{{$data->id_periode}}">{{$data->kode_periode}} </option>
        @endforeach
      </select>
    </div>

 <div class="form-group">
          <label  for="exampleInputEmail1">Bulan Berlaku</label>
      <select name="bulan" class="form-control">
        <option value="">Pilih Bulan</option>
       <?php $periode = \App\Periode::all();  ?>
        @foreach($periode as $data)
        <option value="{{$data->bulan}}">{{$data->bulan}} </option>
        @endforeach
      </select>
    </div>

  <!--   <div class="form-group">
          <label for="exampleInputEmail1">Bulan</label>
            <input name="bulan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bulan berlaku">
    </div> -->
 
     
 <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Pembayaran</label>
            <input name="tgl_pembayaran" id="tgl" type="date" class="form-control"  aria-describedby="emailHelp" placeholder="">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">JUMLAH SPP</label>
            <input name="spp" id="spp" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="jumlah">
    </div>

    

     

    <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Status Pembayaran</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="lunas" checked=""}} > Lunas <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status" value="belum_lunas" > Belum Lunas <i class="input-helper"></i></label>
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
