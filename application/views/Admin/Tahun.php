<?php include 'Header.php';?>
<?php
$aktif = $this->Mtahun->tahun_aktif();
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SISTEM PENENTUAN LULUSAN TERBAIK 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>Admin"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Tahun Akademik</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Tahun Akademik</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
    <div class="box-body">
    <a href="<?php echo site_url('Admin/Tambah_tahun')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Tahun</button></a>
    <br />
    <br />
	<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="8%">Tahun ID</th>
          <th style="width:125px;">Tahun Akademik</th>
          <th style="width:125px;">Status</th>
          <th style="width:125px;">Aksi
          </p></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($tahun as $row){?>
             <tr>
                 <td class="text-center"><?php echo $no++;?></td>
                 <td><?php echo $row->tahun;?></td>
                 <td><?php if($row->status == "1"){echo "Aktif";}else{echo "Tidak Aktif";}?></td>
                <td>
				<?php if($row->status == "1"){ ?>
                 <a href="<?php echo site_url('Admin/edit_tahun?id_tahun_akademik='.$row->id_tahun_akademik);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
				 
				<?php }else{ ?>
				 <a href="<?php echo site_url('Admin/aktif_tahun?id_baru='.$row->id_tahun_akademik.'&id_lama='.$aktif->id_tahun_akademik);?>"><button class="btn btn-success"><i class="glyphicon glyphicon-check"></i></button></a>
				 <a href="<?php echo site_url('Admin/edit_tahun?id_tahun_akademik='.$row->id_tahun_akademik);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                  <a href="<?php echo site_url('Admin/proses_hapus_tahun?id_tahun_akademik='.$row->id_tahun_akademik);?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                  </button></a>
				<?php } ?>
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