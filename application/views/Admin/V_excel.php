<!DOCTYPE html>
<html lang="en">
 <head>

    <title>Laporan penerima bantuan desa pulo rembang</title>

</head>
<body>

<table border="1">
 
      <thead>
 
          <tr>
          <th width="50px">No</th>
          <th width="100px">No KK</th>
          <th width="100px">Nama</th>
            <?php
            foreach ($smart_kriteria as $row) { ?>
          <th width="80px"><?php echo $row->nama_kriteria ?></th>
            <?php
            }
            ?>
          <th width="80px">Hasil</th>
          <th width="140px">Keterangan</th>


  </tr>
 
      </thead>
 
      <tbody>
 <tr>
          <th width="50px"><center>-</center></th>
          <th width="100px">-</th>
          <th width="100px">Bobot</th>
            <?php
            foreach ($smart_kriteria as $row) { ?>
          <th width="80px"><?php echo $row->bobot_normalisasi ?></th>
            <?php
            }
            ?>
          <th width="80px">-</th>
          <th width="140px">-</th>
</tr>
<?php 
                 foreach ($smart_alternatif as $index =>$row2){?> 
             <tr>
                 <td width="50px"><?php echo  $index+1; ?></td>
                 <td width="100px"><?php echo $row2->no_kk;?></td>
                 <td width="100px"><?php echo $row2->nama_alternatif;?></td>
                 <!--<td><?php echo $row->alamat;?></td>-->
              <?php
                  foreach ($smart_kriteria as $row3) { ?> 
                 <td width="80px">
                   
                    <?php
                     
                $query3 = $this->db->query("select * from smart_alternatif_kriteria where id_kriteria='".$row3->id_kriteria."' and id_alternatif='".$row2->id_alternatif."'");
                $ad=$query3->result();
                foreach ($ad as $row4){
                    echo $row4->bobot_alternatif_kriteria;
                    
                    }
                    ?>
                 </td>

                 <?php } ?>
                 <td width="80px"><?php echo $row2->hasil_alternatif;?></td>
                 <td width="140pxs"><?php echo $row2->ket_alternatif;?></td>
              </tr>
 <?php } ?> 
 
      </tbody>
 
 </table>
 </body>
 </html>