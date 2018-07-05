<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Log in</title>
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
</head>
<body class="hold-transition login-page">
<div class="container" style="padding-top: 100px;">
  <h3 class="text-center">Selamat Datang <b><?php echo $this->session->userdata('nama') ?></b> </h3>
  <h4 class="text-center"><b><?php echo $relawan; ?></b></h4>
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Suara pada TPS anda</h3>
            </div>
            <div class="box-body">
              <?php if ($this->session->flashdata('action_status')=='success' || $this->session->userdata('status_akun')==1) { ?>
                <div class="alert alert-success" role="alert">
                  Data berhasil di submit
                </div>
              <?php } ?>
              <?php if ($this->session->flashdata('action_status')=='error') { ?>
                <div class="alert alert-error" role="alert">
                  Something went wrong! Contact the administrator!
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('status_akun')==0) { ?>
                <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>suara/saveData">
              <div class="box-body">
                <?php foreach ($paslon as $data) { ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Paslon <?php echo $data->nama_paslon ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="<?php echo "paslon".$data->id ?>" class="form-control" placeholder="input jumlah suara">
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-send"></i> Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
              <?php } ?>
              
            </div>
        <!-- /.box-body -->
          <div class="text-center">
            <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
          </div>
          </div>
      <!-- /.box -->
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
