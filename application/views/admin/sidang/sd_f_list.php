<?php
echo
"<script>
window.print();
</script>";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sidang</title>
  <style type="text/css">
   @page{
      /* A4 Landscape */
      /* size: 29.7cm 21cm; */
      /* Folio Landscape */
      size: 29.7cm 21.0cm;
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
      color:#00000;
    }
    table tr{
      border: 1px;
      font:normal 12px Tahoma, sans-serif;
    }
 
    thead th{
      text-align: left;
      border: 1px;
      padding: 3px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 3px;
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
	  <table>
	  	<thead>
	  		<tr>
	  			<th rowspan="2" class="short">No</th>
	  			<th rowspan="2" class="normal">Nomor Perkara</th>
	  			<th rowspan="2" class="normal">Jenis Perkara</th>
	  			<th rowspan="2" class="normal">Pemohon/Penggugat</th>
	  			<th rowspan="2" class="normal">Termohon/Tergugat</th>
	  			<th rowspan="2" class="normal">Agenda</th>
	  			<th colspan="2" class="normal">Tanggal</th>
	  		</tr>
        <tr>
          <td>Tunda</td>
          <td>Putus</td>
        </tr>
	  	</thead>
	  	<tbody>
      <?php
      $i = 1; //nantinya akan digunakan untuk pengisian Nomor
      foreach ($sidang->result() as $row) {
                      ?>
                      <tr>
                        <td><?php echo $i++?></td>
                        <td><?= $row->nomor_perkara?></td>
                        <td><?= $row->jenis_perkara_nama?></td>
                        <!-- <td><?= $row->jenis_perkara_nama?></td> -->
                        <td><?= $row->pihak1_text?></td>
                        <td><?= $row->pihak2_text?></td>
                        <td><?= $row->agenda?></td>
                        <td></td>
                        <td></td>
                      </tr>
                  <?php
                      }
                  ?>
	  	</tbody>
	  </table>
	 </div>
</body>
</html>