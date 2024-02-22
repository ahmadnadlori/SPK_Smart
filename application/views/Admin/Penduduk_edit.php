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
        <li><a href="#">Edit Data Siswa</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Edit Data Siswa</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_penduduk')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</button></a>
    <br />
    <br />

    <?php foreach($penduduk as $row){
                $id_alternatif= $row->id_alternatif;
                $no_kk= $row->no_kk;
                $nama_alternatif = $row->nama_alternatif;
                $nilai_utility = $row->hasil_alternatif;
                $ket_alternatif = $row->ket_alternatif;
                $id_kelas=$row->id_kelas;
           ?>

   <?php echo form_open('Admin/proses_edit_penduduk')?>
                          <fieldset>
                             <label>NISN</label>
                              <div class="form-group">
                                  <input class="form-control" name="no_kk" type="number" placeholder="Masukkan NISN" value="<?php echo $no_kk;?>" required>
                                  <?php echo form_error('no_kk');?>
                              </div>

                              <label>Nama Siswa</label>
                              <div class="form-group">
                                  <input class="form-control" name="nama_alternatif" type="text" placeholder="Masukkan Nama" value="<?php echo $nama_alternatif;?>" required>
                                  <?php echo form_error('nama_alternatif');?>
                              </div>
                              <label>Nama Kelas</label>
<div class="form-group">
    <select class="form-control" name="id_kelas">
        <?php if (!empty($kelas)) {
            foreach($kelas as $row){?>
                <option value="<?php echo $row->id_kelas;?>" <?php if($row->id_kelas == $penduduk[0]->id_kelas){echo "selected";}?>><?php echo $row->nama_kelas;?></option>
        <?php }
        } ?>
    </select>
</div> </select>
</div>
                              
                              <!--<div class="form-group">
                                  <small><a href="#" onclick="alert('Please contact the administrator to reset your password!')">Forgot Password?</a></small>
                              </div>-->
                              <input type="submit" value="Simpan" class="btn btn-success ">
                          </fieldset>
                      <?php echo form_close()?>
  <?php } ?>
  </div>
</div>
  
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>

<script>
    $(document).ready(function() {
        $('#id_kelas').change(function() {
            var id_kelas = $(this).val();
            $.ajax({
                url: "<?php echo base_url('Admin/get_kelas_by_id'); ?>",
                method: "POST",
                data: {id_kelas: id_kelas},
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>