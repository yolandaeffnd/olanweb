@extends('backend.app')

 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA PENEMPATAN</h4>

                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
                  </div>


    

  <div class="card-body">

  <form method="POST" action="{{ route('penempatan2.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="form-group">
          <label for="exampleInputEmail1">Kode Periode</label>
            <input name="id_periode" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->periode2->kode_periode}}" readonly="true">
    </div>
    

 <div class="form-group">
          <label for="exampleInputEmail1">Jadwal</label>
            <input name="id_jadwal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->jadwal->kode_jadwal}}" readonly="true">
    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">NIS</label>
            <input name="id_santri" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->santri->nis}}" readonly="true">
    </div>
 <div class="form-group">
          <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input name="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->santri->jk}}" readonly="true">
    </div>   
 <div class="form-group">
          <label  for="exampleInputEmail1">Kode Halaqah</label>
   

      <select name="id_halaqah" class="form-control">
        <option value="">Pilih Halaqah</option>
       <?php 

        $halaqah_2 = \App\Halaqah::all();
        $halaqahsantri = \App\HalaqahSantri::all();
        
        $hasil = [];
        $temp3 =[];


            
            foreach ($halaqah_2 as $hq)
            {
              
              $temp2 = $halaqahsantri->where('id_halaqah',$hq->id_halaqah)->count('id_santri');   

              if($temp2>=3)
              {
                
                $hasil[] =\App\Halaqah::select('id_halaqah')->where('id_halaqah',$hq->id_halaqah)->first();

                             
              } 


            }
            

            if(!empty($hasil))
            {
                foreach ($halaqah_2 as $ht) 
                {
                  foreach ($hasil as $hs) {
                     $santri = DB::table('h_halaqah')->where('id_halaqah','!=',$hs->id_halaqah)
                      ->where('id_jadwal',$data->id_jadwal)->where('jk',$data->santri->jk)->get();
                  }
                 
                }
            }else{
                $santri = DB::table('h_halaqah')->where('id_jadwal',$data->id_jadwal)->where('jk',$data->santri->jk)->get();
            }
            
          
          
          ?>

         
        @foreach($santri as $halaqah)
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
          <label  for="exampleInputEmail1">Minggu ke / Hari ke</label>
   

      <select name="id_pembelajaran_periode" class="form-control" >
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
          <label for="exampleInputEmail1">Tanggal Registrasi</label>
            <input name="tgl_regis" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_regis}}" readonly="true">
    </div>
   <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Berlaku</label>
            <input name="tgl_mulai" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->tgl_mulai}}">
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Satus Registrasi</label>
            <input name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$data->status}}" readonly="true">
    </div>
   


   





    

<div class="modal-footer">
       <a href="{{ route('penempatan2.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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

