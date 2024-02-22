<?php include 'Header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SISTEM PENENTUAN LULUSAN TERBAIK
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>Admin"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="#">Tambah Data Siswa</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Siswa</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?php echo site_url('Admin/tambah_penduduk') ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah data siswa</button></a>
                <br />
                <br />
                <?php echo form_open('Admin/proses_simpan_penduduk') ?>
                <fieldset>
                    <div class="form-group">
                        <label>NISN</label>
                        <input class="form-control" name="no_kk" type="number" placeholder="Masukkan NISN" required value="<?php echo set_value('no_kk') ?>">
                        <?php echo form_error('no_kk'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input class="form-control" name="nama_alternatif" type="text" placeholder="Masukkan Nama Siswa" required value="<?php echo set_value('nama_alternatif') ?>">
                    </div>

                    <label>Nama Kelas</label>
                    <div class="form-group">
                        <?php
                        @$id_kelas = ($this->session->userdata("wk") == true) ? $this->session->userdata("id_kelas") : null;


                        ?>
                        <select class="form-control" name="id_kelas" id="id_kelas">
                            <?php if ($id_kelas != null) { ?>
                                <?php foreach ($kelas as $row) {
                                    if ($row->id_kelas == $id_kelas) { ?>
                                        <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                                    <?php }    ?>
                                <?php } ?>
                            <?php } else { ?>
                                <?php foreach ($kelas as $row) { ?>
                                        <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success ">
                    </div>
                </fieldset>
                <?php echo form_close() ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'Footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#id_kelas').change(function() {
            var id_kelas = $(this).val();
            $.ajax({
                url: "<?php echo base_url('Admin/get_kelas_by_id'); ?>",
                method: "POST",
                data: {
                    id_kelas: id_kelas
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>