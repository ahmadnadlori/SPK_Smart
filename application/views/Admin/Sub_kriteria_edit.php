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
        <li><a href="#">Edit Sub Kriteria</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Edit Sub Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_kriteria')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah kriteria</button></a>
    <br />
    <br />

    <?php foreach($sub_kriteria as $row){
                $id_sub_kriteria = $row->id_sub_kriteria;
                $nama_sub_kriteria = $row->nama_sub_kriteria;
                $nilai_sub_kriteria = $row->nilai_sub_kriteria;
                $id_kriteria = $row->id_kriteria;
          } ?>

   <?php echo form_open('Admin/proses_edit_sub_kriteria')?>
                          <fieldset>
                              <div class="form-group">
                              <label>Nama Sub Kriteria</label>
                                  <input class="form-control" name="nama_sub_kriteria" placeholder="kriteria" value="<?php echo $nama_sub_kriteria;?>" required>
                              </div>
                              <label>Nilai Sub Kriteria</label>
                              <div class="form-group">
                                  <input class="form-control" type="number" name="nilai_sub_kriteria" placeholder="bobot" value="<?php echo $nilai_sub_kriteria;?>" required>
                              </div>
                              <label>Nama Kriteria</label>
                              <div class="form-group">
                                  <select readonly class="form-control" name="id_kriteria">
                               <?php foreach($sub_kriteria as $row){?>
                              <option value="<?php echo $row->id_kriteria;?>"><?php echo $row->nama_kriteria;?></option>
                                <?php }?>
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