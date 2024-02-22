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
        <li><a href="#">Data User</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="box">

    <div class="box-header with-border">
          <h3 class="box-title">Data User</h3>

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
  <?php if ($this->session->userdata('akses') != "kepala sekolah"){ ?>
    <div class="row mb-4">
      <div class="col-md-6">
          <a href="<?php echo site_url('Admin/Tambah_user')?>"><button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> Tambah Data User</button></a>
      </div>
      <div class="col-md-6 text-right mb-4">
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
                  <th>Username</th>
                  <th>Akses</th> 
                  <!--<th>alamat</th>-->
                
                  <?php if ($this->session->userdata('akses') != "kepala sekolah"){ ?><th style="width:125px;">Action
                  </p></th><?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($user as $row){?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->username;?></td>
                        <td><?php echo $row->akses;?></td>
                        <?php if ($this->session->userdata('akses') != "kepala sekolah"){ ?>
                        <td>
                        <a href="<?php echo site_url('Admin/edit_user?username='.$row->username);?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button></a>
                        <a href="<?php echo site_url('Admin/hapus_user?username='.$row->username);?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></a>
                 
                  </button></a>
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