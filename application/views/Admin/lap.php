<?php include 'Header.php';?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       SISTEM PENENTUAN LULUSAN TERBAIK     
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>Admin"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Laporan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<div class="box">
		<div class="box-header with-border">
			  <h3 class="box-title">Filter</h3>
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
						title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
		</div>
		<div class="box-body">
			<form action="<?=base_url('Cetak/laporan');?>" method="POST">
				<input <?php if (isset($_POST['filter'])) {echo "value='".$_POST['jumlah']."'";}?> name="jumlah" class="form-control" autocomplete="off" type="number" required />
				<button name="filter" type="submit" class="btn btn-primary w-100"><i class="fa fa-print"></i> Cetak</button>
			</form>
		</div>
	</div>
  
  
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>