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
    <div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Penilaian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_penilaian')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Penilaian</button></a> 
    <!--<a href="<?php echo site_url('Admin/Eksekusi_penilaian')?>" target="_blank"><button class="btn btn-primary" ><i class="glyphicon glyphicon-expand"></i> Eksekusi penilaian</button></a>-->
    <br />
    <br />
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>NISN</th>
          <th>Nama Siswa</th>
          <th>Nama Kelas</th>
          <?php
          foreach ($smart_kriteria as $row) { 
            if ($this->session->userdata('akses') ==  "wali kelas"){
                      if ($row->nama_kriteria == "Nilai Rata-rata Raport" || $row->nama_kriteria == "Nilai Presensi Kehadiran" || $row->nama_kriteria == "Nilai Ujian Sekolah"){
            ?>
          <th><?php echo $row->nama_kriteria ?></th>
            <?php } 
            }else if ($this->session->userdata('akses') == "wakasek"){
				              if ($row->nama_kriteria == "Nilai Ekstrakulikuler" || $row->nama_kriteria == "Nilai Prestasi"){
            ?>
            <th><?php echo $row->nama_kriteria ?></th>
            <?php } 
            }else{
            ?>
            <th><?php echo $row->nama_kriteria ?></th>
            <?php }?>
          <?php } ?>
          <th width="140">Aksi</th>
        </tr>
      </thead>
      <tbody>
         <?php
             foreach ($smart_alternatif as $index =>$row2){?> 
             <tr>
                 <td><?php echo  $index+1; ?></td>
                 <td><?php echo $row2->no_kk;?></td>
                 <td><?php echo $row2->nama_alternatif;?></td>
                 <td><?php echo $row2->nama_kelas;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  foreach ($smart_kriteria as $row3) { 
                    
                    if ($this->session->userdata('akses') ==  "wali kelas"){
                      if ($row3->nama_kriteria == "Nilai Rata-rata Raport" || $row3->nama_kriteria == "Nilai Presensi Kehadiran" || $row3->nama_kriteria == "Nilai Ujian Sekolah"){
              ?> 
                          <td>
                            
                              <?php
                              
                          $query3 = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                          $ad=$query3->result();
                          foreach ($ad as $row4){
                              echo $row4->nilai_alternatif_kriteria;
                              
                              }
                              ?>
                          </td>
              <?php   } ?>
              <?php }else if ($this->session->userdata('akses') == "wakasek"){
				              if ($row3->nama_kriteria == "Nilai Ekstrakulikuler" || $row3->nama_kriteria == "Nilai Prestasi"){
              ?>
                          <td>
                            
                              <?php
                              
                          $query3 = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                          $ad=$query3->result();
                          foreach ($ad as $row4){
                              echo $row4->nilai_alternatif_kriteria;
                              
                              }
                              ?>
                          </td>
              <?php } ?>
              <?php   }else{ ?>

                          <td>
                            
                              <?php
                              
                          $query3 = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                          $ad=$query3->result();
                          foreach ($ad as $row4){
                              echo $row4->nilai_alternatif_kriteria;
                              
                              }
                              ?>
                          </td>

              <?php } ?>
                 <?php } ?>

                 
                
                <td>

                  <a href="<?php echo site_url('Admin/edit_penilaian?id_alternatif='.$row2->id_alternatif);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i>
                  </button>
                  <a href="<?php echo site_url('Admin/proses_hapus_penilaian?id_alternatif='.$row2->id_alternatif);?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                  </button></a></a>
                  </td>
              </tr>
 <?php } ?>          
      </tbody>
    </table>
</div>
  </div>
</div>
  
  
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>