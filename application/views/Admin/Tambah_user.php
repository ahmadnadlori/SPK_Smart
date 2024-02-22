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
        <li><a href="#">Tambah User</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Tambah User</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/tambah_user')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah User</button></a>
    <br />
    <br />
   <?php echo form_open('Admin/tambah_user')?>
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" name="username" type="text" placeholder="username" required>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" name="password" type="text" placeholder="password" required>
                              </div>
                              <div class="form-group">
                                  <!--<input class="form-control" name="akses" type="text" placeholder="akses" required>-->
                                  <select id="akses" name="akses" class="form-control <?php echo (form_error('akses')) ? 'is-invalid' : ''; ?>">
                                <option value="">-- Pilih Akses --</option>
                                <option value="kepala sekolah">Kepala Sekolah</option>
                                <option value="wakasek">Wakasek</option>
                                <option value="operator">Operator</option>
                                <option value="wali kelas">Wali Kelas</option>
                                
                            </select>
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
