@extends('template.app')

 @section('content')
<div class="card">
                  <div class="card-header">
                    <h4 class="card-title">DATA AGENDA</h4>
                <button data-toggle="modal" data-target="#staticBackdrop" class="btn btn pull-right btn-success"><i class="fa fa-plus"></i>  Tambah Data </a></button>
              </div>
  <div class="card-body">
   <table class="table table-striped table-bordered" id="datatables">  
            
                    <thead>
                    <tr>      
                      <th>NO</th>
                      <th>JUDUL</th>
                      <th>TANGGAL</th>
                      <th>DESKRIPSI</th>
                     
                      
            
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                                   

                   <!--    BAGIAN BODY TABEL -->


                      <tbody>
                        <?php $i=0;
                        $datas = \App\Agenda::all(); ?>
                        @foreach($datas as $data)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$data->judul}}</td>
                          <td>{{$data->tgl}}</td>
                          <td>{{$data->deskripsi}}</td>
      
                           <td>




                             <form action="{{route('agenda.destroy', $data)}}" method="post"> 
            <a href="{{route('agenda.edit', $data)}}" class="btn btn-primary btn-xs"><i class="fa  icon-pencil"></i></a>   
           
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa icon-trash"></i></button></form>  
                           </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

<!-- ===================================================================================================================================================================TAMBAH ISI DATA TEMPAT=========================================================

 -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel"><b>Tambah Data Agenda</b></h3>
    </div>
    <div class="modal-body">

       <form method="POST" action="{{ route('agenda.store') }}">
        {{ csrf_field() }}
    <div class="form-group">
          <label for="exampleInputEmail1">Judul</label>
            <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="judul">
    </div>   
    <div class="form-group">
          <label for="exampleInputEmail1">Tanggal</label>
            <input name="tgl" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
           <label for="exampleTextarea1">Textarea</label>
          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
                      
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


@stop 