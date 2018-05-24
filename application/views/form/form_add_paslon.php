<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Pasangan Calon
        <small>form tambah data pasangan calon </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i>Pasangan Calon</a></li>
        <li><a href="#">Tambah Pasangan Calon</a></li>
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
              <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>paslon/saveData">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
              <div class="box-body">
              	<div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nomor Urut Pasangan Calon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan no.urut PASLON" name="no_urut_paslon">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama Pasangan Calon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan Nama PASLON" name="nama_paslon">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Warna</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" placeholder="Pilih warna pasangan calon" name="warna_paslon">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>paslon" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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