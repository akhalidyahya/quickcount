<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Relawan
        <small>form tambah data relawan </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Relawan</a></li>
        <li><a href="#"> Tambah Relawan</a></li>
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
              <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>users/saveData">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan Nama Relawan" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Masukan Email Relawan" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Masukan Password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputRole" class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="role" id="inputRole">
                      <option>Relawan</option>
                      <option>Admin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTPS" class="col-sm-2 control-label">TPS</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="tps" id="inputTPS">
                      <?php foreach ($tps as $data) { ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->nama_tps; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>users" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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