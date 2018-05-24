<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>informasi mengenai quick count </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-home-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah TPS</span>
              <span class="info-box-number"><?php echo $jumlah_tps ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Suara Masuk</span>
              <span class="info-box-number"><?php foreach ($jumlah_suara as $data) { echo $data->jumlah; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Relawan</span>
              <span class="info-box-number"><?php echo $jumlah_relawan ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <!-- DONUT CHART -->
          <div class="box box">
            <div class="box-header with-border">
              <h3 class="box-title">Hasil Quick Count</h3>
              <div>
                <?php foreach ($paslon as $data) { ?>
                <i class="fa fa-circle" style="color: <?php echo $data->warna ?>;"></i> <?php echo $data->nama_paslon ?> <span style="margin-right: 15px;"></span>
              <?php } ?>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-md-12 -->

        <div class="col-md-12">
          <!-- BAR CHART -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Suara per TPS</h3>
              <div>
                <?php foreach ($paslon as $data) { ?>
                <i class="fa fa-circle" style="color: <?php echo $data->warna ?>;"></i> <?php echo $data->nama_paslon ?> <span style="margin-right: 15px;"></span>
              <?php } ?>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="overflow-x: auto;">
              <div class="chart">
                <canvas id="barChart" style=""></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-md-12 -->

      </div>

    </section>
    <!-- /.content -->
  </div>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var dataSuara = [];
    var areaChartData = {
      labels  : [<?php foreach ($tps as $data) {
        echo "'$data->nama_tps - $data->tempat_tps',";
      } ?>],
      datasets: [
        <?php foreach ($suara as $data) { ?>
          {
            label               : <?php echo "'$data->nama_paslon'" ?>,
            fillColor           : <?php echo "'$data->warna'" ?>,
            strokeColor         : <?php echo "'$data->warna'" ?>,
            pointColor          : <?php echo "'$data->warna'" ?>,
            pointStrokeColor    : <?php echo "'$data->warna'" ?>,
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(0,0,0,1)',
            data                : [<?php echo $data->concat ?>]
          },
        <?php } ?>
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : false,
      multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>",
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      <?php foreach ($suara as $data) { ?>
          {
            value    : <?php echo $data->jumlah ?>,
            color    : <?php echo "'$data->warna'" ?>,
            highlight: <?php echo "'$data->warna'" ?>,
            label    : <?php echo "'$data->nama_paslon'" ?>
          },
      <?php } ?>
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
  });
</script>