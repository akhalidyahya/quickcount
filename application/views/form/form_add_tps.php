<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data TPS
        <small>form tambah data tps </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> TPS</a></li>
        <li><a href="#"> Tambah TPS</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-8 col-sm-push-2">
          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <div class="box-body">
              <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>tps/saveData">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama TPS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan Nama TPS" name="nama_tps">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Wilayah TPS</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan Wilayah TPS" name="tempat_tps">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>tps" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-send"></i> Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
        <!-- /.box-body -->
          </div>
      <!-- /.box -->
        </div>
        <!-- /.col-md-12 -->
      </div>

    </section>
    <!-- /.content -->
  </div>`