@extends('template.app')

 @section('content')


              <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Rumah Tahfizh Ahlul Quran</h5>
                   <!--  <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p> -->
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i>Santri (123)</button>
                    </div>
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-user mr-2"></i>Guru</button>
                    </div>
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-home mr-2"></i>Gedung</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sessions by channel</h4>
                    <div class="aligner-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="sessionsDoughnutChart" height="196" style="display: block; width: 280px; height: 196px;" width="280" class="chartjs-render-monitor"></canvas>
                      <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                        <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                        <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small>
                      </div>
                    </div>
                    <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                      <div class="d-flex">
                        <span class="square-indicator bg-danger ml-2"></span>
                        <p class="mb-0 ml-2">Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-success ml-2"></span>
                        <p class="mb-0 ml-2">Not Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-warning ml-2"></span>
                        <p class="mb-0 ml-2">Reassigned</p>
                      </div>
                    </div>
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
          
          
         
           
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        
          <!-- partial -->
       

@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

Highcharts.chart('csantri', {
    chart: {
        type: 'column'
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
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        data: [49.9, 71.5]

    }]
});
</script>

@stop