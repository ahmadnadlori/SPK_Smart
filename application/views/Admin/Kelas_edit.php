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
        <li><a href="#">Edit Kelas</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Edit Kelas</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_kelas')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Kelas</button></a>
    <br />
    <br />

    <?php foreach($kelas as $row){
                $id_kelas = $row->id_kelas;
                $nama_kelas = $row->nama_kelas;
          } ?>

   <?php echo form_open('Admin/proses_edit_kelas')?>
                          <fieldset>
                              <div class="form-group">
                              <label>Nama Kelas</label>
                                  <input class="form-control" name="nama_kelas" placeholder="kelas" value="<?php echo $nama_kelas;?>" required>
                              </div>
                              <!--<div class="form-group">
                                  <small><a href="#" onclick="alert('Please contact the administrator to reset your password!')">Forgot Password?</a></small>
                              </div>-->
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