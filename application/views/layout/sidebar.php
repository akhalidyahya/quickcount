<style type="text/css">
.skin-black-light .sidebar-menu>li.active {
  border-right: 3.5px solid #353535;
}
</style>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="<?php //echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> --> 
          <i class="fa fa-user-circle" style="font-size: 50px;"></i>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(1) == 'dashboard') echo "active"; ?>">
          <a href="<?php echo base_url(); ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'tps') echo "active"; ?>">
          <a href="<?php echo base_url(); ?>tps">
            <i class="fa fa-bar-chart"></i> <span>TPS</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'paslon') echo "active"; ?>">
          <a href="<?php echo base_url(); ?>paslon">
            <i class="fa fa-drivers-license-o"></i> <span>Paslon</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'users') echo "active"; ?>">
          <a href="<?php echo base_url(); ?>users">
            <i class="fa fa-user"></i> <span>Relawan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>