<!DOCTYPE html>
<html lang="en"><head>
    <title>Laporan Hasil Penentuan Lulusan Terbaik</title>
    <!-- <style>
    table{
      border-collapse: collapse;
      width: 770;
      margin: 1;
    }
    table th{
        border:1px solid #000;
        padding: 3px;
        
        text-align: center;
    }
    table td{
        border:1px solid #000;
        padding: 3px;
        text-align: center;

    }
    </style>-->
    <style>
      .table1 {
  border-collapse: collapse;
  width: 770;
  margin: 1;
}

.table1 th {
  border: 1px solid #000;
  padding: 3px;
  text-align: center;
  border: none;
}

.table1 td {
  border: 1px solid #000;
  padding: 3px;
  text-align: center;
  border: none;
}

.table2 {
  border-collapse: collapse;
  width: 770;
  margin: 1;
}

.table2 th {
  border:2px solid #000;
        padding: 3px;
        
        text-align: center;
}

.table2 td {
  border:2px solid #000;
        padding: 3px;
        text-align: center;
}

.table3 {
  border-collapse: collapse;
  width: 770;
  margin: 1;
  text-align: center;
}

</style>
</head><body>
 
     <table border="0" cellspasing=0 cellpadding=0 width="100%" class="table1">
                    <tr>
                    <td width="25%" align="center"><img src="data:image/png;base64, <?=$image?>" height="150px"></td>
                    <td width="50%" align="center" style="font-family:Arial;">
                        <strong>PEMERINTAH PROVINSI JAWA BARAT<br>
                        DINAS PENDIDIKAN
                        <br>
                        <span style="font-size: 20px" >CABANG DINAS PENDIDIKAN WILAYAH X</span>
                        <br>
                        <span style="font-size: 20px" >SMA NEGERI I MANDIRANCAN</span>
                        <br>
                        </strong>
                        <span style="font-size:13px;">
                        Jl. Siliwangi No. 1A Mandirancan E-mail : sma1mandirancan@gmail.com <br>
                        </span>  
                        <span style="font-size:13px;">
                        Kabupaten Kuningan 45558 <br>
                        </span>  
                    </td>
                    <td width="25%" align="center"><img src="data:image/png;base64, <?=$image2?>" height="160px"></td>
                    <td></td>
                </tr>

                <tr>
  <td colspan="3" align="center">
    <strong>
      <hr style="border-top: 2px solid #000; border-bottom: 1px solid #000;">
    </strong>
  </td>
</tr>
                <tr>
                    <td colspan="3" align="center"><strong><?php
   $s=date("Y"); echo "DAFTAR HASIL ";
   if (isset($_POST['filter'])) {echo $_POST['jumlah'];}
   echo " LULUSAN TERBAIK "; echo $s; ?> </strong>
                    </td>
                </tr>                       
</table>
<br>
<br>
  <?php  echo "dicetak pada : "; echo tgl_indo(date('Y-m-d')); ?>
<table border="1" class="table2">
  <tr>
          <th width="50px">No</th>
          <th width="100px">NISN</th>
          <th width="120px">Nama</th>
          <th width="100px">Kelas</th>
            <?php
            foreach ($smart_kriteria as $row) { ?>
          <th width="80px"><?php echo $row->nama_kriteria ?></th>
            <?php
            }
            ?>
          <th width="50px">Hasil</th>
          <th width="140px">Ranking</th>


  </tr>
  <tr>
          <th width="50px"><center>-</center></th>
          <th width="100px">-</th>
          <th width="100px">-</th>
          <th width="100px">Bobot</th>
            <?php
            foreach ($smart_kriteria as $row) { ?>
          <th width="80px"><?php echo $row->bobot_normalisasi ?></th>
            <?php
            }
            ?>
          <th width="80px">-</th> 
          <th width="80px">-</th>
</tr>
        <?php 
                $no = 1;
                 foreach ($smart_alternatif as $index =>$row2){
					  if (isset($_POST['filter'])) {
							if($no <= $_POST['jumlah']){
					 ?> 
             <tr>
                 <td width="50px"><?php echo  $index+1; ?></td>
                 <td width="100px"><?php echo $row2->no_kk;?></td>
                 <td width="100px"><?php echo $row2->nama_alternatif;?></td>
                 <td width="100px"><?php echo $row2->nama_kelas;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  foreach ($smart_kriteria as $row3) { ?> 
                 <td width="80px">
                   
                    <?php
                     
                $query3 = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                $ad=$query3->result();
                foreach ($ad as $row4){
                    echo $row4->nilai_alternatif_kriteria;
                    
                    }
                    ?>
                 </td>

                 <?php } ?>
                 <td width="80px"><?php echo $row2->hasil_alternatif;?></td>
                 <td width="140pxs"><?php echo $no++;?></td>
              </tr>
			  
			  <?php
							}
						}else{
					?>
					
				<tr>
                 <td width="50px"><?php echo  $index+1; ?></td>
                 <td width="100px"><?php echo $row2->no_kk;?></td>
                 <td width="100px"><?php echo $row2->nama_alternatif;?></td>
                 <td width="100px"><?php echo $row2->nama_kelas;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  foreach ($smart_kriteria as $row3) { ?> 
                 <td width="80px">
                   
                    <?php
                     
                $query3 = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                $ad=$query3->result();
                foreach ($ad as $row4){
                    echo $row4->nilai_alternatif_kriteria;
                    
                    }
                    ?>
                 </td>

                 <?php } ?>
                 <td width="80px"><?php echo $row2->hasil_alternatif;?></td>
                 <td width="140pxs"><?php echo $no++;?></td>
              </tr>
				 <?php } } ?> 
           
</table>
<!--<p style="text-indent: 0.2in;">Keterangan :
          <ol>      
          <li>Hasil 0-74 status ditolak</li>
          <li>Hasil 75-100 status diterima</li>
          </ol>-->
          
 <table border="0" cellspasing=0 cellpadding=0 width="100%" class="table3">
                    <tr>
                    <td width="70%"></td>
                    <td>
                    <?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 
echo "Kuningan, ".tgl_indo(date('Y-m-d'));
 
?>
                    <br><br>
                    Kepala Sekolah   
                    <br><br><br><br><br><br>
                    AGUS HILMAN, S.Pd.I.,M.Si.
                    <br>
                    NIP. 19670504 200604 1 009
                    </td>
                </tr>
                       
</table>
</body>
</html>

