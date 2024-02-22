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
        <li><a href="#">Edit Tahun Akademik</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Edit Tahun Akademik</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_tahun')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Tahun Akademik</button></a>
    <br />
    <br />

    <?php foreach($tahun as $row){
                $tahun = $row->tahun;
          } ?>

   <?php echo form_open('Admin/proses_edit_tahun')?>
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" name="tahun" placeholder="Tahun Akademik" value="<?php echo $tahun;?>" required>
                              </div>
                              <input type="submit" value="Simpan" class="btn btn-success ">
                          </fieldset>
                      <?php echo form_close()?>
  </div>
</div>
  
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>