<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="../../index3.html" class="brand-link">
  <img src="<?= base_url() ?>assets/mystyle/img/Edumant1.png" width="50">
  <span class="brand-text font-weight-light ml-2"><img src="<?= base_url('assets/mystyle/img/LogoEdulab.png') ?>" width="100"></span>
</a>

<!-- Sidebar -->
<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="<?= base_url('dashboard') ?>" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('cabang_belajar') ?>" class="nav-link">
          <i class="fas fa-university nav-icon"></i>
          <p>Cabang Belajar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('user') ?>" class="nav-link">
          <i class="fas fa-users nav-icon"></i>
          <p>Data User</p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file-invoice-dollar"></i>
          <p>
            Data Tagihan
            <i class="right fas fa-angle-right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('tagihan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Semua Tagihan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pembayaran') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pembayaran Tagihan</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('invoice') ?>" class="nav-link">
          <i class="far fa-file nav-icon"></i>
          <p>Invoice User</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('statistik_cabang') ?>" class="nav-link">
          <i class="fas fa-chart-pie nav-icon"></i>
          <p>Statistik Cabang</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('admin') ?>" class="nav-link">
          <i class="fas fa-user-graduate nav-icon"></i>
          <p>Admin</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>