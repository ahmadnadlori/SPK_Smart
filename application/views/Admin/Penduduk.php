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
        <li><a href="#">Data Siswa</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="box">
      <!-- Default box -->
    <div class="box-header with-border">
          <h3 class="box-title">Data Siswa</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
    </div>
      <!-- Default box -->
 <div class="box-body">
 <?php if ($this->session->userdata('akses') != "kepala sekolah" && $this->session->userdata('akses') != "wakasek"){?>
    <div class="row mb-4">
      <div class="col-md-6">
          <a href="<?php echo site_url('Admin/Tambah_penduduk')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Data Siswa</button></a>
      </div>
      <div class="col-md-6 text-right mb-4">
            <a href="<?php echo site_url('Admin/export_siswa')?>" class="btn btn-primary">
              <i class="fa fa-download"></i> Export Data Siswa
            </a>
      </div>
    </div>
  <?php } ?>

  
    <div class="row mt-4" style="margin-top: 20px">
      <div class="col-md-12 mt-4">

        <div class="table-responsive">
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NISN</th>
                  <th>Nama Siswa</th> 
                  <th>Nama Kelas</th> 
                  <!--<th>alamat</th>-->
                
                  <?php if ($this->session->userdata('akses') != "kepala sekolah" && $this->session->userdata('akses') != "wakasek"){?><th style="width:125px;">Aksi
                  </p></th><?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($penduduk as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->no_kk;?></td>
                        <td><?php echo $row->nama_alternatif;?></td>
                        <td><?php echo $row->nama_kelas;?></td>
                        <?php if ($this->session->userdata('akses') != "kepala sekolah" && $this->session->userdata('akses') != "wakasek"){?>
                        <td>
                          <a href="<?php echo site_url('Admin/edit_penduduk?id_alternatif='.$row->id_alternatif);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                          <a href="<?php echo site_url('Admin/proses_hapus_penduduk?id_alternatif='.$row->id_alternatif);?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                          </button></a>


                        </td>
                        <?php } ?>
                      </tr>
                    <?php }?>
              </tbody>
            </table>
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