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
        <li><a href="#">Kriteria</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Kriteria</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_kriteria')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Kriteria</button></a>
    <br />
    <br />
	<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="8%">Kriteria ID</th>
          <th style="width:125px;">Nama Kriteria</th>
          <th style="width:125px;">Bobot Kriteria</th>
          <th style="width:125px;">Normalisasi Bobot</th>
          <th style="width:125px;">Aksi
          </p></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($kriteria as $row){?>
             <tr>
                 <td class="text-center"><?php echo $no++;?></td>
                 <td><?php echo $row->nama_kriteria;?></td>
                 <td><?php echo $row->bobot_kriteria;?></td>
                 <td><?php echo $row->bobot_normalisasi;?></td>
                <td>
                 <a href="<?php echo site_url('Admin/edit_kriteria?id_kriteria='.$row->id_kriteria);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                  <a href="<?php echo site_url('Admin/proses_hapus_kriteria?id_kriteria='.$row->id_kriteria);?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                  </button></a>


                </td>
              </tr>
             <?php }?>



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