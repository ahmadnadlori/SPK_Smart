<?php include 'Header.php';?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>SISTEM PENENTUAN LULUSAN TERBAIK
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                <div class="col-lg-3 col-6">

                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?=$this->db->get_where('smart_alternatif')->num_rows()?></h3>
                      <p>Data Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                  </div>

                </div>


                <div class="col-lg-3 col-6">

<div class="small-box bg-orange">
  <div class="inner">
    <h3><?=$this->db->get_where('smart_kriteria')->num_rows()?></h3>
    <p>Data Kriteria</p>
  </div>
  <div class="icon">
    <i class="fa fa-line-chart"></i>
  </div>
</div>

</div>

                <div class="col-lg-3 col-6">

                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?=$this->db->get_where('smart_kelas')->num_rows()?></h3>
                      <p>Data Kelas</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-building"></i>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-6">

                  <div class="small-box bg-red">
                    <div class="inner">
                    <h3><?=$this->db->get_where('smart_akun')->num_rows()?></h3>
                      <p>Data User</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                  </div>

                </div>
            </div>
            <div class="col-md-12" >
            <div id="piechart" style="width: 700px; height: 400px;"></div>
            </div>
            <!--<div class="col-md-12">
              <h2>Selamat datang admin</h2>
              <p style="text-indent: 0.2in;">Sistem pendukung keputusan ini dibuat untuk menentukan status siswa SMAN 1 Mandirancan  yang 
              berhak mendapatkan predikat Lulusan Terbaik,dalam menentukan keputusan sistem ini menggunakan metode simple multi attribute rating technique (SMART) 
              </p>
              <p style="text-indent: 0.2in;">Cara penggunaan :
              <p>
              <ol>      
              <li>Input data kriteria</li>
              <li>Input Data Sub Kriteria</li>
              <li>Input data penduduk</li>
              <li>lakukan penilan terhadap data penduduk</li>
              <li>lihat hasil penilaian (hasil 0-74 status ditolak, hasil 75-100 status diterima)</li>
              <li>cetak laporan</li>
              </ol>
              </p>
            </div>-->
          </div>
          
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'Footer.php';?>

<script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Kelas', 'Jumlah Siswa'],
                <?php foreach($siswa_per_kelas as $siswa) { ?>
                    ['<?php echo $siswa->nama_kelas ?>', <?php echo $siswa->jumlah_siswa ?>],
                <?php } ?>
            ]);

            var options = {
  title: 'Jumlah Siswa Per Kelas',
  pieHole: 0.3,
  titleTextStyle: {
    textAlign: 'center',
    fontSize: 15
  },
  chartArea: {
    width: '70%',
    height: '70%'
  },
  legend: {
    position: 'bottom'
  },
  responsive: true
};

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>


