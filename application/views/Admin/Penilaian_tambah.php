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
            <li><a href="#">Tambah Penilaian</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Penilaian</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?php echo site_url('Admin/tambah_penilaian') ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Penilaian</button></a>
                <br />
                <br />
                <?php echo form_open('Admin/proses_simpan_penilaian') ?>
                <fieldset>
                    <div class="form-group col-md-12">
                        <label>Siswa</label><br>
                        <?php
                        $aktif = $this->Mtahun->tahun_aktif();
                        $id_aktif = $aktif->id_tahun_akademik;
                        $cond = ($this->session->userdata('wk'))  == true ? "AND a.id_kelas ='". $this->session->userdata("id_kelas") . "'" : "";
                        $queryyy = $this->db->query("SELECT a.id_alternatif, a.no_kk, a.nama_alternatif, k.nama_kelas
    FROM smart_alternatif a
    JOIN smart_kelas k ON a.id_kelas = k.id_kelas  
	
	WHERE a.id_alternatif NOT IN (SELECT id_alternatif FROM smart_alternatif_kriteria GROUP BY id_alternatif
HAVING COUNT(id_alternatif) = 5) AND a.id_tahun_akademik = '$id_aktif' $cond");
                        $result = $queryyy->result();
                        if (count($result) > 0) {
                        ?>
                            <select class="form-control" name="alt">
                                <?php
                                foreach ($result as $row3) { ?>
                                    <option value="<?php echo $row3->id_alternatif; ?>">
                                        <?php echo $row3->no_kk; ?>-<?php echo $row3->nama_alternatif; ?> (<?php echo $row3->nama_kelas; ?>)
                                    </option>
                                <?php } ?>
                            </select>
                        <?php
                        } else {
                            echo "Tidak ada Data Siswa yang belum di Tambahkan Penilaian.";
                        }
                        ?>
                    </div>
                    <?php echo form_close() ?>

                    <?php
                    $query = $this->db->query('select * from smart_kriteria');
                    $ab = $query->result();
                    $no = 1;
                    foreach ($ab as $row) {
                        if ($this->session->userdata('akses') == "wali kelas") {
                            if ($row->nama_kriteria == "Nilai Rata-rata Raport" || $row->nama_kriteria == "Nilai Presensi Kehadiran" || $row->nama_kriteria == "Nilai Ujian Sekolah") { ?>
                                <div class="form-group col-md-6">
                                    <label>Kriteria</label><br>
                                    <input class="form-control" type="hidden" name="kri[<?php echo $row->id_kriteria; ?>]" type="text" placeholder="nama" value="<?php echo $row->id_kriteria; ?>"><?php echo $no++ ?>.
                                    <?php echo $row->nama_kriteria; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nilai/Nama Sub Kriteria</label><br>
                                    <select class="form-control" name="altkri[<?php echo $row->id_kriteria; ?>]">
                                        <?php
                                        $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='" . $row->id_kriteria . "' order by nilai_sub_kriteria asc");
                                        $ac = $queryy->result();
                                        foreach ($ac as $row2) { ?>
                                            <option value="<?php echo $row2->nilai_sub_kriteria; ?>"><?php echo $row2->nama_sub_kriteria; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php }
                        } else if ($this->session->userdata('akses') == "wakasek") {
                            if ($row->nama_kriteria == "Nilai Ekstrakulikuler" || $row->nama_kriteria == "Nilai Prestasi") { ?>
                                <div class="form-group col-md-6">
                                    <label>Kriteria</label><br>
                                    <input class="form-control" type="hidden" name="kri[<?php echo $row->id_kriteria; ?>]" type="text" placeholder="nama" value="<?php echo $row->id_kriteria; ?>"><?php echo $no++ ?>.
                                    <?php echo $row->nama_kriteria; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nilai/Nama Sub Kriteria</label><br>
                                    <select class="form-control" name="altkri[<?php echo $row->id_kriteria; ?>]">
                                        <?php
                                        $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='" . $row->id_kriteria . "' order by nilai_sub_kriteria asc");
                                        $ac = $queryy->result();
                                        foreach ($ac as $row2) { ?>
                                            <option value="<?php echo $row2->nilai_sub_kriteria; ?>"><?php echo $row2->nama_sub_kriteria; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="form-group col-md-6">
                                <label>Kriteria</label><br>
                                <input class="form-control" type="hidden" name="kri[<?php echo $row->id_kriteria; ?>]" type="text" placeholder="nama" value="<?php echo $row->id_kriteria; ?>"><?php echo $no++ ?>.
                                <?php echo $row->nama_kriteria; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nilai/Nama Sub Kriteria</label><br>
                                <select class="form-control" name="altkri[<?php echo $row->id_kriteria; ?>]">
                                    <?php
                                    $queryy = $this->db->query("select * from smart_sub_kriteria where id_kriteria='" . $row->id_kriteria . "' order by nilai_sub_kriteria asc");
                                    $ac = $queryy->result();
                                    foreach ($ac as $row2) { ?>
                                        <option value="<?php echo $row2->nilai_sub_kriteria; ?>"><?php echo $row2->nama_sub_kriteria; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } ?>

                    <?php } ?>

                    <div class="form-group col-md-12">
                        <input type="submit" value="Simpan" class="btn btn-success ">
                    </div>
                </fieldset>
                <?php echo form_close() ?>
            </div>
        </div>
        <!--<form>
         <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" style="width:500px;">
         </div>
         <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Description" style="width:500px;"></textarea>
         </div>
      </form>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#title').autocomplete({
                source: "<?php echo site_url('Admin/get_autocomplete'); ?>",
     
                select: function (event, ui) {
                    $('[name="title"]').val(ui.item.label); 
                    $('[name="description"]').val(ui.item.description); 
                }
            });

    });
  </script>-->
    </section>
</div>
<?php include 'Footer.php'; ?>