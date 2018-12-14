<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    @page{
        /* A4 Landscape */
        /* size: 29.7cm 21cm; */
        /* Folio Landscape */
        size: 33cm 21.6cm;
        margin:5mm 5mm 5mm 5mm;
    }
    #outtable{
      /* padding: 20px; */
      border:1px solid #e3e3e3;
      /* width:600px; */
      /* border-radius: 5px; */
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: unset;
      border: 1px;
      font-family: arial;
      color:#5E5B5C;
    }

    table tr{
      font:normal 11px Tahoma, sans-serif;
    }
 
    thead th{
      /* border: 1px; */
      text-align: left;
      /* padding: 10px; */
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 0px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>

	<div id="outtable">
  <p align="right">RI/PA9</p>
<h1 align="center">REGISTER AKTA CERAI</h1>
	  <table>
	  	<thead>
      <tr>
            <th rowspan="2" align="justify">No</th>
            <th rowspan="2">Penggugat/Pemohon</th>
            <th rowspan="2">Tergugat/Termohon</th>
            <th>A.Tanggal BHT</th>
            <th>A.Nomor Akta Cerai</th>
            <th>A.Nomor Putusan PA/Msy</th>
            <th>A.Nomor Putusan PTA/Msy</th>
            <th>A.Nomor Putusan MA-RI</th>
            <th rowspan="2">No Seri Akta Cerai</th>
            <th>A.Talak Raj'i/Ba'in Sughro/Bain Kubro/Khu'lu</th>
            <th rowspan="2">Tanggal Penyerahan Akta</th>
            <th rowspan="2">Keterangan</th>
        </tr>
        <tr>
            <td><b>B.Tanggal Ikrar</b></td>
            <td><b>B.Tanggal Akta Cerai</b></td>
            <td><b>B.Tanggal Putusan PA/Msy</b></td>
            <td><b>B.Tanggal Putusan PTA/Msy</b></td>
            <td><b>B.Tanggal Putusan MA-RI</b></td>
            <td><b>B.Talak Ke 1,2,3</b></td>
        </tr>
        <tr bgcolor="#f2f2f2" align="center">
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
        </tr>
	  	</thead>
	  	<tbody>
	  	<?php
                                $i = 1; //nantinya akan digunakan untuk pengisian Nomor
                                foreach ($lap_akte->result() as $row) {
                            ?>
                            <tr>
             <td rowspan="2"><?php echo $i++?></td>
             <td rowspan="2"><?= $row->pihak1_text?></td>
             <td rowspan="2"><?= $row->pihak2_text?></td>
             <td>A.<?= $row->tgl_bht?></td>
             <td>A.<?= $row->nomor_akta_cerai?></td>
             <td>A.<?= $row->nomor_perkara?></td>
             <td>A.<?= $row->putusan_banding?></td>
             <td>A.<?= $row->putusan_kasasi?></td>
             <td rowspan="2"><?= $row->no_seri_akta_cerai ?></td>
             <td>A. 
             <?php
                $hk=$row->jenis_perkara_id;
                if ($hk==346){
                    echo "Talak Raj'i";
                }else if ($hk==347){
                    echo "Talak Bain";
                }else{
                    echo "-";
                }
                ?></td>
             <!-- <td>A.<?= $row->jenis_perkara_id?></td> -->
             <td>P1.<?= $row->serah1?></td>
             <td>-</td>
        </tr>
        <tr>
             <td>B.<?= $row->tgl_ikrar?></td>
             <td>B.<?= $row->tgl_ac?></td>
             <td>B.<?= $row->tgl_put?></td>
             <td>B.</td>
             <td>B.</td>
             <td>B.Talak Ke <b><?= $row->perceraian_ke?></b></td>
             <td>P2.<?= $row->serah2?></td>
             <td>-</td>
        </tr>
                        <?php
                            }
                        ?>
	  	</tbody>
	  </table>
	 </div>
</body>
</html>