@extends('backend.app')
 @section('content')

<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">EDIT DATA HALAQAH SANTRI</h4>
                  </div>
                    <!--=====================================================================================================================================TAMBAH DATA SANTRI===================-->
<div class="card-body">


    



  <form method="POST" action="{{ route('halaqahsantri.update', $data) }}">
        {{ csrf_field() }}
            {{ method_field('put') }}

      <div class="form-group">
          <label for="exampleInputEmail1">Nis Santri</label>
            <input name="id_santri" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" readonly="true" value="{{$data->id_santri}}">
    </div> 

 <select name="id_halaqah" class="form-control">
        <option value="">Pilih Halaqah</option>
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

    
<div class="modal-footer">
         <a href="{{route('halaqahsantri.index')}}" class="btn btn-secondary">close</a>
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