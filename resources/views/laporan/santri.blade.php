@extends('template.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA SANTRI</h4>
          
                        
                       </div>

<div class="col-md-12 grid-margin">
<div class="card-body">
    <!-- <a href="{{route('registrasi.create')}}" class="btn ml-lg-auto download-button btn-success btn-sm my-1 my-sm-0">Tambah Data</a> -->

      <form method="POST" action="">
        {{ csrf_field() }}

  <div class="row">
     <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Tahun</label>
           <select name="input_tahun" class="form-control">
          <option value="" disabled selected>-Pilih Tahun-</option>
          <?php
            $thn_skr = date('Y');
            for ($i = $thn_skr; $i >= 2015; $i--) {
              ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php
            }
          ?>
        </select>
    </div>   
    <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Bulan</label>
            <select name="id_periode" class="form-control">
                <option value="">-Pilih Bulan-</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
    </div>
    
  </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-icon-text">
                            <i class="icon-cloud-upload btn-icon-prepend"></i> View </button>
        <button type="button" class="btn btn-info btn-icon-text"> PDF <i class="icon-printer btn-icon-append"></i>
                          </button>


                        
                        
    </div>
</div>

   


</form>
                  </div>
                </div>
@stop 