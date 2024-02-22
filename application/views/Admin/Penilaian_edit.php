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
      <li><a href="#">Penilaian</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <h3>Edit Penilaian</h3>
    <br />
    <a href="<?php echo site_url('Admin/Tambah_penilaian')?>"><button class="btn btn-success"><i
          class="glyphicon glyphicon-plus"></i> Tambah Penilaian</button></a>
    <br />
    <br />

    <?php foreach($penilaian as $row){
                $id_smart_alternatif_kriteria=$row->id_smart_alternatif_kriteria;
                $id_alternatif = $row->id_alternatif;
                $id_kriteria=$row->id_kriteria;
                $nilai_alternatif_kriteria= $row->nilai_alternatif_kriteria;
                $bobot_alternatif_kriteria=$row->bobot_alternatif_kriteria;
          } ?>
    <?php foreach($penilaian2 as $row2){
            $no_kk=$row2->no_kk;
                $nama_alternatif=$row2->nama_alternatif;
          } ?>


    <?php echo form_open('Admin/proses_edit_penilaian')?>
    <fieldset>
      <div class="form-group col-md-12">
        <label>Alternatif</label><br>
        <select class="form-control" name="alt" readonly>
          <option value="<?php echo $id_alternatif;?>"><?php echo $no_kk;?>-<?php echo $nama_alternatif;?></option>

        </select>
      </div>
      <!--<div class="form-group col-md-12">
                               <label>No KK</label>
                                  <input class="form-control" name="nama" type="text" placeholder="no_kk" required>
                              </div>
                              <div class="form-group col-md-12">
                               <label>Alamat</label>
                                  <input class="form-control" name="nama" type="text" placeholder="alamat" required>
                              </div>-->


      <?php
                              $query = $this->db->query('select * from smart_kriteria');
                              $ab =$query->result();
                               $no=1; 
                              foreach ($ab as $row) { 
                                if ($this->session->userdata('akses') == "wali kelas"){
                                  if ($row->nama_kriteria == "Nilai Rata-rata Raport" || $row->nama_kriteria == "Nilai Presensi Kehadiran" || $row->nama_kriteria == "Nilai Ujian Sekolah"){?>
                                      <div class="form-group col-md-6">
                                        <label>Kriteria</label><br>
                                        <input class="form-control" type="hidden" name="kri[<?php echo $row->id_kriteria;?>]" type="text"
                                          placeholder="nama" value="<?php echo $row->id_kriteria;?>"><?php echo $no++ ?>.
                                        <?php echo $row->nama_kriteria;?>
                                      </div>
                                      <!--
                                                              <div class="form-group col-md-3">
                                                              <label>Action</label><br> 
                                                              <a href="<?php echo site_url('Admin/edit_penduduk?id_krteria='.$row->id_kriteria);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                              </div>
                                                              -->
                                      <div class="form-group col-md-6">
                                        <label>Nilai/Nama Sub Kriteria</label><br>
                                        <select class="form-control" name="altkri[<?php echo $row->id_kriteria;?>]">
                                          <?php
                                                              $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='".$row->id_kriteria."' order by nilai_sub_kriteria asc" );
                                                              $ac=$queryy->result();
                                                              foreach ($ac as $row2) { ?>
                                          <option value="<?php echo $row2->nilai_sub_kriteria;?>"><?php echo $row2->nama_sub_kriteria;?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                              
                                  <?php }
                                }else if ($this->session->userdata('akses') == "wakasek"){ 
                                  if ($row->nama_kriteria == "Nilai Ekstrakulikuler" || $row->nama_kriteria == "Nilai Prestasi"){?>
                                      <div class="form-group col-md-6">
                                        <label>Kriteria</label><br>
                                        <input class="form-control" type="hidden" name="kri[<?php echo $row->id_kriteria;?>]" type="text"
                                          placeholder="nama" value="<?php echo $row->id_kriteria;?>"><?php echo $no++ ?>.
                                        <?php echo $row->nama_kriteria;?>
                                      </div>
                                      <!--
                                                              <div class="form-group col-md-3">
                                                              <label>Action</label><br> 
                                                              <a href="<?php echo site_url('Admin/edit_penduduk?id_krteria='.$row->id_kriteria);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                              </div>
                                                              -->
                                      <div class="form-group col-md-6">
                                        <label>Nilai/Nama Sub Kriteria</label><br>
                                        <select class="form-control" name="altkri[<?php echo $row->id_kriteria;?>]">
                                          <?php
                                                              $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='".$row->id_kriteria."' order by nilai_sub_kriteria asc" );
                                                              $ac=$queryy->result();
                                                              foreach ($ac as $row2) { ?>
                                          <option value="<?php echo $row2->nilai_sub_kriteria;?>"><?php echo $row2->nama_sub_kriteria;?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                              
                                <?php }
                                }else{ ?>
                                
                                      <div class="form-group col-md-6">
                                        <label>Kriteria</label><br>
                                        <input class="form-control" type="hidden" name="kri[<?php echo $row->id_kriteria;?>]" type="text"
                                          placeholder="nama" value="<?php echo $row->id_kriteria;?>"><?php echo $no++ ?>.
                                        <?php echo $row->nama_kriteria;?>
                                      </div>
                                      <!--
                                                              <div class="form-group col-md-3">
                                                              <label>Action</label><br> 
                                                              <a href="<?php echo site_url('Admin/edit_penduduk?id_krteria='.$row->id_kriteria);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                                              </div>
                                                              -->
                                      <div class="form-group col-md-6">
                                        <label>Nilai/Nama Sub Kriteria</label><br>
                                        <select class="form-control" name="altkri[<?php echo $row->id_kriteria;?>]">
                                          <?php
                                                              $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='".$row->id_kriteria."' order by nilai_sub_kriteria asc" );
                                                              $ac=$queryy->result();
                                                              foreach ($ac as $row2) { ?>
                                          <option value="<?php echo $row2->nilai_sub_kriteria;?>"><?php echo $row2->nama_sub_kriteria;?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                              
                                <?php } ?>
                              <?php }?>
      <!--<div class="form-group">
                                  <small><a href="#" onclick="alert('Please contact the administrator to reset your password!')">Forgot Password?</a></small>
                              </div>-->
      <div class="form-group col-md-12">
        <input type="submit" value="Simpan" class="btn btn-success ">
      </div>
    </fieldset>
    <?php echo form_close()?>
</div>


</section>
<!-- /.content -->

<!-- /.content-wrapper -->
<?php include 'Footer.php';?>