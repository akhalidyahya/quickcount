<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hasil Quickcount</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- SCRIPT -->
  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
</head>
<body class="hold-transition login-page">
<div class="container" style="padding-top: 100px;">
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
                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> -->
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
</div>
</div>
<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var dataSuara = [];
    var areaChartData = {
      labels  : [<?php foreach ($tps as $data) {
        echo "'$data->nama_tps $data->tempat_tps',";
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
</body>
</html>