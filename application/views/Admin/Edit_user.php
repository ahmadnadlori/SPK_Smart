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
        <li><a href="#">Edit User</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content">
    <div class="box">
    <div class="box-header with-border">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <?php echo form_open('Admin/edit_user?username='.$user->username); ?>

                    <div class="form-group row">
                        <label for="new_username" class="col-md-4 col-form-label text-md-right">Username Baru</label>

                        <div class="col-md-6">
                            <input id="new_username" type="text" class="form-control <?php echo (form_error('new_username')) ? 'is-invalid' : ''; ?>" name="new_username" value="<?php echo set_value('new_username', $user->username); ?>" autofocus>

                            <?php echo form_error('new_username', '<span class="invalid-feedback"><strong>', '</strong></span>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control <?php echo (form_error('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?php echo set_value('password'); ?>">

                            <?php echo form_error('password', '<span class="invalid-feedback"><strong>', '</strong></span>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="akses" class="col-md-4 col-form-label text-md-right">Akses</label>

                        <div class="col-md-6">
                            <select id="akses" name="akses" class="form-control <?php echo (form_error('akses')) ? 'is-invalid' : ''; ?>">
                                <option value="">-- Pilih Akses --</option>
                                <option value="kepala sekolah" <?php echo set_select('akses', 'kepala sekolah', ($user->akses == 'kepala sekolah')); ?>>Kepala Sekolah</option>
                                <option value="wakasek" <?php echo set_select('akses', 'wakasek', ($user->akses == 'wakasek')); ?>>Wakasek</option>
                                <option value="operator" <?php echo set_select('akses', 'operator', ($user->akses == 'operator')); ?>>Operator</option>
                                <option value="wali kelas" <?php echo set_select('akses', 'wali kelas', ($user->akses == 'wali kelas')); ?>>Wali Kelas</option>
                                
                            </select>

                            <?php echo form_error('akses', '<span class="invalid-feedback"><strong>', '</strong></span>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">
                                Simpan
                            </button>
                            <a href="<?php echo site_url('Admin/user'); ?>" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

  
  
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>
<script>
    <?php if ($this->session->flashdata('error')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $this->session->flashdata('error') ?>'
        });
    <?php } ?>

    <?php if ($this->session->flashdata('success')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '<?= $this->session->flashdata('success') ?>'
        });
    <?php } ?>
</script>