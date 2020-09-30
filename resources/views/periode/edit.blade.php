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
          <label for="exampleInputEmail1">Semester</label>
            <input name="semester" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="semester" value="{{$data->semester}}">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Bulan</label>
            <input name="bulan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="bulan" value="{{$data->bulan}}">
    </div>

    <div class="modal-footer">
        <a href="{{ route('periode.index') }}">    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
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