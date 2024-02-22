<?php include 'Header.php';?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        SISTEM PENENTUAN LULUSAN TERBAIK        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Penilaian</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
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
    <a href="<?php echo site_url('Admin/Tambah_penilaian')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah penilaian</button></a>
    <br />
    <br />
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="50">No</th>
      <th>NISN</th>
      <th>Nama</th>
            <?php
            $query = $this->db->query('select * from smart_kriteria');
            $a=$query->result();
            foreach ($a as $row) { ?>
      <th><?php echo $row->nama_kriteria ?></th>
            <?php
            }
            ?>
      <th>Hasil</th>
      <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <th>-</th>
          <th>-</th>
      <th>Bobot</th>
            <?php
            $query = $this->db->query('select * from smart_kriteria');
            $a=$query->result();
            foreach ($a as $row) { ?>
      <th><?php echo $row->bobot_normalisasi ?></th>
            <?php
            }
            ?>
      <th>-</th>
      <th>-</th>
        </tr>

              <?php
                $query = $this->db->query('select * from smart_alternatif');
                $ab=$query->result();
                $no=1; 
                 foreach ($ab as $index=> $row2) { ?> 
             <tr>
                 <td><?php echo $index+1;?></td>
                 <td><?php echo $row2->no_kk;?></td>
                 <td><?php echo $row2->nama_alternatif;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  $query = $this->db->query('select * from smart_kriteria');
                  $ac=$query->result();
                  $no=1; 
                  foreach ($ac as $row3) { ?> 
                 <td>
                   
                    <?php
                $query = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                $ad=$query->result();
                foreach ($ad as $row4){
                  $ida = $row4->id_alternatif;
                  $idk = $row4->id_kriteria;
                    echo $kal=$row4->nilai_alternatif_kriteria*$row3->bobot_normalisasi;

       $ea = $this->db->query("update smart_alternatif_kriteria set bobot_alternatif_kriteria='".$kal."' where id_alternatif='".$ida."' and id_kriteria='".$idk."'");
    
                    }?>
                 </td>

                 <?php } ?>
                 
             
                  
                 <td>
                  <?php

                $queryku = $this->db->query("select sum(bobot_alternatif_kriteria) as bak from smart_alternatif_kriteria where id_alternatif='".$row2->id_alternatif."'");
                //$queryku->result();
                $ideas = $row2->id_alternatif;
              echo $hsl = $queryku->row()->bak;
              if($hsl>=85){
                $ket = "diterima";
              } else{
                $ket = "ditolak";
              }
              $hasil =  $this->db->query("update smart_alternatif set hasil_alternatif='".$hsl."', ket_alternatif='".$ket."' where id_alternatif='".$ideas."'");
                
                ?>
                 </td>              
                <td>
                 <?php
              if($hsl>=85){
                $ket2 = "diterima";
              } else{
                $ket2= "ditolak";
              }
              echo $ket2;
              ?>
                </td>
    <?php } ?>

              </tr>
           



      </tbody>

      <tfoot>
        <tr>
          <th width="50">No</th>
      <th>Alternatif</th>
            <?php
            $query = $this->db->query('select * from smart_kriteria');
            $a=$query->result();
            foreach ($a as $row) { ?>
      <th><?php echo $row->nama_kriteria ?></th>
            <?php
            }
            ?>
      <th>Hasil</th>
      <th>Keterangan</th>
        </tr>
      </tfoot>
    </table>
</div>
  </div>
</div>
  
  
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>