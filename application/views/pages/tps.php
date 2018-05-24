<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TPS
        <small>informasi mengenai tps </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bar-chart"></i> TPS</a></li>
        <!-- <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel Data TPS</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <a href="<?php echo base_url(); ?>tps/tambahTps" id="myButton" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
              <br><br>
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama TPS</th>
                    <th>Tempat TPS</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($tps as $data) { ?>  
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data->nama_tps; ?></td>
                    <td><?php echo $data->tempat_tps; ?></td>
                    <td><a href="<?php echo base_url(); ?>tps/editTps/<?php echo $data->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i>Edit</a> <a href="<?php echo base_url(); ?>tps/deleteTps/<?php echo $data->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a></td>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
        </div>
        <!-- /.col-md-8 -->

      </div>

    </section>
    <!-- /.content -->
  </div>
<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#myTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
</script>