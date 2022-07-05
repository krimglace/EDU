<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edulab</title>

	<!-- Responsive Website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/mystyle/css/style.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/bootstrap/css/bootstrap.min.css">
	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
  <div class="wrapper">
  	<!-- Navbar -->
  	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    	<!-- Left navbar links -->
    	<ul class="navbar-nav">
      		<li class="nav-item">
        		<a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      		</li>
      		<li class="nav-item d-none d-sm-inline-block">
        		<a href="<?= base_url('dashboard') ?>" class="nav-link">Home</a>
      		</li>
	    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item text-center">
            <img src="<?= base_url() ?>assets/mystyle/img/Edumant1.png" width="50">
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('login/logout') ?>" class="dropdown-item dropdown-footer">
            <i class="fas fa-turn-off"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->	