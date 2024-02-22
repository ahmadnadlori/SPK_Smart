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
        <li><a href="#">Sub Kriteria</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Sub Kriteria</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
      <!-- Default box -->
    <a href="<?php echo site_url('Admin/Tambah_sub_kriteria')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Sub kriteria</button></a>
    <br />
    <br />
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="12%">No Sub Kriteria</th>
          <th width="40%">Nama Kriteria</th>
          <th>Nama Sub Kriteria</th> 
          <th width="15%">Aksi</th>         
        </tr>
      </thead>
      <tbody><?php $no=1;
                              $query = $this->db->query('select * from smart_kriteria');
                              $a=$query->result();
                               $no=1; 
                              foreach ($a as $row) { ?>
             <tr>
              

                 <td><?php echo $no++;?></td>
                 <td><?php echo $row->nama_kriteria;?></td>
                 
                 <td>
                      <?php
                              $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='".$row->id_kriteria."' order by nilai_sub_kriteria asc");
                              $ab=$queryy->result();
                               foreach ($ab as $row2) { ?>
                  <?php echo $row2->nama_sub_kriteria;?> berinilai <?php echo $row2->nilai_sub_kriteria;?> <button class="btn btn-warning" style="visibility: hidden;"><i class="glyphicon glyphicon-pencil" style="visibility: hidden;"></i></button>
                   <br><br><?php }?>
                
                  
                </td>
                <td>
                      <?php foreach ($ab as $row2) { ?>
                        <a href="<?php echo site_url('Admin/edit_sub_kriteria?id_sub_kriteria='.$row2->id_sub_kriteria);?>">
                        <button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                        <a href="<?php echo site_url('Admin/proses_hapus_sub_kriteria?id_sub_kriteria='.$row2->id_sub_kriteria);?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                        </button></a><br><br>
                      <?php } ?>
                </td>
                <?php }?>
              </tr>
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