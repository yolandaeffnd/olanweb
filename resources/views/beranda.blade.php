@extends('backend.app')
 @section('content')


              <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0 center"> Rumah Tahfizh Ahlul Quran</h5>
                   <!--  <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p> -->
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i>Santri {!!json_encode($santri)!!}</button>
                    </div>
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-user mr-2"></i>Guru {!!json_encode($guru)!!}</button>
                    </div>
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-home mr-2"></i>Gedung {!!json_encode($tempat)!!}</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Ends-->
             <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0 center">Agenda Kegiatan</h5>
                   <!--  <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p> -->
                  </div>
                   <div class="card-body">
                    
                    <ul class="list-ticked scroll">
                     <?php $i=0;
                       $agenda= \App\Agenda::orderBy('tgl','desc')->get();
                        $b = Carbon\Carbon::today();?>
                        @foreach($agenda as $data2)
                     <h5><li>{{$data2->judul}}
                      @if($data2->tgl>$b)
                      <div class="badge badge-primary ml-2">{{$data2->tgl}}</div>
                      @else
                       <div class="badge badge-danger ml-2">{{$data2->tgl}}</div>
                      @endif
                      <div class="text-muted"><p>{{$data2->deskripsi}}</p></div></li></h5>
                      @endforeach
                    </ul>
                  </div>
                  
                </div>
              </div>
            </div>
    @if(Auth::user()->level != 'Wakbid Kesiswaan' && Auth::user()->level!='Wakbid Kurikulum' && Auth::user()->level!='Bendahara' && Auth::user()->level!='Guru' && Auth::user()->level!='Admin')
    <div class="row">
               <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                     <div id="jsantri"></div>
                  </div>
                </div>
              </div>
            
               <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div id="csantri">

                  </div>

            </div>
          </div>
        </div>
      @endif


     

                  

             
           
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        
          <!-- partial -->
       

@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

Highcharts.chart('csantri', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Jumlah Santri Rumah Tahfizh Ahlul Quran'
    },
    subtitle: {
        text: 'Per Periode'
    },
    xAxis: {
        categories: {!!json_encode($kategori)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} santri</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        data: {!!json_encode($data)!!},

    }]
});
</script>
<script type="text/javascript">

// Build the chart
// Build the chart
Highcharts.chart('jsantri', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Santri'
    },
     subtitle: {
        text: 'Laki-Laki dan Perempuan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Perempuan',
            y: {!!json_encode($wa)!!},
            sliced: true,
            selected: true
        }, {
            name: 'Laki-Laki',
            y: {!!json_encode($lk)!!}
        }]
    }]
});
</script>

@stop