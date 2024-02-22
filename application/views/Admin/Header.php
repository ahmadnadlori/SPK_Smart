<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIPALUTER</title>
    <link rel="icon" href="picture/SMAN1MANDIRANCAN.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  </head>


  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url();?>Admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SPK</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIPALUTER</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <a class="responsive-img" href="<?php echo site_url();?>Admin"><img
              src="<?php echo base_url();?>picture/SMAN1MANDIRANCAN.png" style="height: 45px; padding-top: 4px;"><b>
              <font color="white" size="4" style="height: 55px; padding-top: 30px;"> SMA NEGERI 1 MANDIRANCAN</font>
            </b></a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.png" class="user-image"
                    alt="User Image">
                  <span class="hidden-xs"><?=$this->session->userdata('nama')?></span>
                </a>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.png" class="img-circle"
                      alt="User Image">

                    <p>

                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo site_url(); ?>Login/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li>
              <a href="<?php echo site_url(); ?>Admin">
                <i class="fa fa-fw fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>



            <?php if ($this->session->userdata('akses') == "wali kelas" || $this->session->userdata('akses') == "wakasek"){ ?>


              
            <li>
              <a href="<?php echo site_url(); ?>Admin/Penduduk">
                <i class="glyphicon glyphicon-user"></i> <span>Data Siswa</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>Admin/Penilaian">
                <i class="glyphicon glyphicon-th-list"></i> <span>Penilaian</span>
              </a>
            </li>

            <?php } ?>

            <?php if ($this->session->userdata('akses') == "kepala sekolah"){ ?>
              
            <li>
              <a href="<?php echo site_url(); ?>Admin/Penduduk">
                <i class="glyphicon glyphicon-user"></i> <span>Data Siswa</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>Admin/hasil_penilaian">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Hasil Penilaian</span>
              </a>
            </li>

            <li>
              <a href="<?php echo site_url(); ?>Admin/laporan" style="text-decoration:none">
                <i class="glyphicon glyphicon-file"></i> <span>Laporan</span>
              </a>
            </li>

            <?php } ?>

            
            <?php if ($this->session->userdata('akses') == "operator"){ ?>

			<li>
              <a href="<?php echo site_url(); ?>Admin/Kriteria">
                <i class="glyphicon glyphicon-pencil"></i> <span>Kriteria</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url(); ?>Admin/Sub_kriteria">
                <i class="glyphicon glyphicon-book"></i> <span>Sub Kriteria</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url(); ?>Admin/Tahun">
                <i class="glyphicon glyphicon-calendar"></i> <span>Tahun Akademik</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url(); ?>Admin/Kelas">
                <i class="	glyphicon glyphicon-equalizer"></i> <span>Data Kelas</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url(); ?>Admin/Penduduk">
                <i class="glyphicon glyphicon-user"></i> <span>Data Siswa</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>Admin/hasil_penilaian">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Hasil Penilaian</span>
              </a>
            </li>
            

            <li>
              <a href="<?php echo site_url(); ?>Admin/laporan" style="text-decoration:none">
                <i class="glyphicon glyphicon-file"></i> <span>Laporan</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url(); ?>Admin/User">
                <i class="glyphicon glyphicon-cog"></i> <span>Data User</span>
              </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?php echo site_url(); ?>Login/logout" style="text-decoration:none">
                <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>
              </a>
            </li>
              
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>