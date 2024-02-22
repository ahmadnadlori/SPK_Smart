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
        <li><a href="#">Hasil Penilaian</a></li>
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
			<form action="" method="POST">
				<input <?php if (isset($_POST['filter'])) {echo "value='".$_POST['jumlah']."'";}?> name="jumlah" class="form-control" autocomplete="off" type="number" required />
				<button name="filter" type="submit" class="btn btn-primary w-100"><i class="fa fa-search"></i> Filter</button>
			</form>
		</div>
	</div>
	
	

    <div class="box">
    <div class="box-header with-border">
          <h3 class="box-title">Hasil Penilaian</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <!--<p style="text-indent: 0.2in;">Keterangan :
          <p>
          <ol>      
          <li>Hasil 0-74 status ditolak</li>
          <li>Hasil 75-100 status diterima</li>
          </ol>
          </p>-->
     
    <div class="box-body">
    <!--<a href="<?php echo site_url('Cetak/laporan_excel')?>"><button class="btn btn-primary" >Export Excel</button></a><br><br>-->
    <!--<a href="<?php echo site_url('Admin/eksekusi')?>"><button class="btn btn-primary" ><i class="glyphicon glyphicon-refresh"></i> reload</button></a>--> 
 
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="120%">
      <thead>
        <tr>
          <th>No</th>
          <th>NISN</th>
          <th>Nama</th>
          <th>Kelas</th>
          <?php
          foreach ($smart_kriteria as $row) { ?>
          <th><?php echo $row->nama_kriteria ?></th>
            <?php } ?>
          <th>Hasil</th>
          <th>Ranking</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <th>-</th>
          <th>-</th>
          <th>-</th>
          <th>Bobot</th>
          <?php
          foreach ($smart_kriteria as $row) { ?>
          <th><?php echo $row->bobot_normalisasi ?></th>
            <?php } ?>
            <th>-</th>
          <th>-</th>
        </tr>

         <?php 
                  $no = 1;
                 foreach ($smart_alternatif as $index =>$row2){
					 if (isset($_POST['filter'])) {
							if($no <= $_POST['jumlah']){
                  ?> 
             <tr>
                 <td><?php echo  $index+1; ?></td>
                 <td><?php echo $row2->no_kk;?></td>
                 <td><?php echo $row2->nama_alternatif;?></td>
                 <td><?php echo $row2->nama_kelas;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  foreach ($smart_kriteria as $row3) { ?> 
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
                 <td><?php echo $row2->hasil_alternatif;?></td>
                 <td><?php echo $no++;?></td>

              </tr>
			  <?php
							}
						}else{
					?>
				<tr>
                 <td><?php echo  $index+1; ?></td>
                 <td><?php echo $row2->no_kk;?></td>
                 <td><?php echo $row2->nama_alternatif;?></td>
                 <td><?php echo $row2->nama_kelas;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  foreach ($smart_kriteria as $row3) { ?> 
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
                 <td><?php echo $row2->hasil_alternatif;?></td>
                 <td><?php echo $no++;?></td>

              </tr>	
						<?php } } ?>          
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