<?php
echo
"<script>
window.print();
</script>";
?>
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
                     <table>
                         <thead>
                         <tr >
                         <th>Putusan PA</th>
                         <th colspan="2">Pemohon/Penggugat</th>
                         <th colspan="2">Termohon/Tergugat</th>
                         <th>Perceraian yang Terjadi</th>
                         <th>Akta Cerai</th>
                         <th colspan="2">Akta Nikah</th>
                         <th rowspan="4">Iddah</th>
                         <th rowspan="4">Lama Nikah</th>
                         <th rowspan="4">Ket</th>
                     </tr>
                     <tr align="">
                         <td><b>A.Nomor</b></td>
                         <td><b>A.Nama</b></td>
                         <td><b>A.NIK</b></td>
                         <td><b>A.Nama</b></td>
                         <td><b>A.NIK</b></td>
                         <td><b>A.Hukum</b></td>
                         <td><b>A.Nomor</b></td>
                         <td><b>A.Nomor</b></td>
                         <td rowspan="3" align="center"><b>KUA</b></td>
                     </tr>
                     <tr>
                         <td rowspan="2"><b>B.Tanggal</b></td>
                         <td><b>B.Pendidikan</b></td>
						 <td rowspan="2"><b>Alamat</b></td>
                         <td><b>B.Pendidikan</b></td>
						 <td rowspan="2"><b>Alamat</b></td>
                         <td><b>B.Keadaan</b></td>
                         <td rowspan="2"><b>B.Tanggal</b></td>
                         <td rowspan="2"><b>B.Tanggal</b></td>
                     </tr>
                     <tr >
                         <!-- <td></td> -->
                         <td><b>C.Pekerjaan</b></td>
                         <td><b>C.Pekerjaan</b></td>
                         <td><b>C.Sebab</b></td>
                         <!-- <td colspan="2"></td> -->
                         <!-- <td></td> -->
                     </tr>
                     <tr  bgcolor="#f2f2f2" align="center">
                         <td><b>1</b></td>
                         <td><b>2</b></td>
                         <td><b>3</b></td>
                         <td><b>4</b></td>
                         <td><b>5</b></td>
                         <td><b>6</b></td>
                         <td><b>7</b></td>
                         <td><b>8</b></td>
                         <td><b>9</b></td>
                         <td><b>10</b></td>
                         <td><b>11</b></td>
                         <td><b>12</b></td>
                     </tr>
                         </thead>
                         <tbody>
                         <?php
                            $i = 1; //nantinya akan digunakan untuk pengisian Nomor
                            foreach ($lap_kua->result() as $row) {
                        ?>
                        <!-- mulai datanya -->
                            <tr                              >
                                <td><b>A.</b><?= $row->nomor_perkara?></td>
                                <td><b>A.</b><?= $row->nama?></td>
                                <td><b>A.</b><?= $row->noiden1?></td>
                                <td><b>A.</b><?= $row->nama2?></td>
                                <td><b>A.</b><?= $row->noiden1?></td>
                                <td><b>A.</b>
                                <?php
                                    $hk=$row->hukum;
                                    if ($hk==346){
                                        echo "Talak Raj'i";
                                    }else if ($hk==347){
                                        echo "Talak Bain";
                                    }else{
                                        echo "-";
                                    }
                                ?>
                                </td>
                                <td><b>A.</b><?= $row->nomor_akta_cerai?></td>
                                <td><b>A.</b><?= $row->no_kutipan_akta_nikah?></td>
                                <td rowspan="3">
                                <?php
                                    $kua = $row->kua_tempat_nikah;
                                    $stredit = str_replace("Kantor Urusan Agama "," ",$kua);
                                    echo $stredit;
                                ?>
                                </td>
                                <td rowspan="3">
                                <?php 
                                    $iddah = $row->keadaan_istri;
                                    if ($iddah==1){
                                        echo "Suci";
                                    }else if ($iddah==2){
                                        echo "Haid";
                                    }else if ($iddah==3){
                                        echo "Hamil";
                                    }else{
                                        echo "Tidak diketahui";
                                    }
                                ?>
                                </td>
                                <td rowspan="3">
                                <?php 
                                    $tanggalnikah = new DateTime($row->tgl_nikah);
                                    $tanggalbht = new DateTime($row->tanggal_bht);
                                    $y = $tanggalbht->diff($tanggalnikah)->y; 
                                    $m = $tanggalbht->diff($tanggalnikah)->m;
                                    $d = $tanggalbht->diff($tanggalnikah)->d;
                                    echo $y.",".$m."th"
                                ?>
                                </td>
                                <td rowspan="3">
                                <?php
                                    $jp= $row->jenis_perkara_id;
                                    if ($jp==346){
                                        echo "CT";
                                    }else if($jp==347){
                                        echo "CG";
                                    }else{
                                        echo "-";
                                    }
                                ?>
                                </td>
                            </tr>
                            <!-- B -->
                            <tr >
                                <td rowspan="2"><b>B.</b><?= $row->tanggal_putusan?></td>
                                <td><b>B.</b><?php
                                    $pen1= $row->pend1;
                                        if($pen1 == 1){
                                            echo "TK";
                                        }elseif($pen1 == 2){
                                            echo "SD";
                                        }elseif($pen1 ==3){
                                            echo "SLTP";
                                        }elseif ($pen1 ==4) {
                                            echo "SLTA";
                                        }elseif ($pen1==5) {
                                            echo "D1";
                                        }elseif ($pen1==6) {
                                            echo "D2";
                                        }elseif ($pen1==7) {
                                            echo "D3";
                                        }elseif ($pen1==8) {
                                            echo "D4";
                                        }elseif ($pen1==9) {
                                            echo "S1";
                                        }elseif ($pen1==10) {
                                            echo "S2";
                                        }elseif ($pen1==11) {
                                            echo "S3";
                                        }elseif ($pen1==12) {
                                            echo "Belum Sekolah";
                                        }else{
                                            echo "Tidak Ada";
                                        }
                                    ?></td>
									<td rowspan="2"><?= $row->alamat?></td>
                                <td><b>B.</b><?php
                                    $pen2= $row->pend2;
                                        if($pen2 == 1){
                                            echo "TK";
                                        }elseif($pen2 == 2){
                                            echo "SD";
                                        }elseif($pen2 ==3){
                                            echo "SLTP";
                                        }elseif ($pen2 ==4) {
                                            echo "SLTA";
                                        }elseif ($pen2==5) {
                                            echo "D1";
                                        }elseif ($pen2==6) {
                                            echo "D2";
                                        }elseif ($pen2==7) {
                                            echo "D3";
                                        }elseif ($pen2==8) {
                                            echo "D4";
                                        }elseif ($pen2==9) {
                                            echo "S1";
                                        }elseif ($pen2==10) {
                                            echo "S2";
                                        }elseif ($pen2==11) {
                                            echo "S3";
                                        }elseif ($pen2==12) {
                                            echo "Belum Sekolah";
                                        }else{
                                            echo "Tidak Ada";
                                        }
                                    ?></td>
									<td rowspan="2"><?= $row->alamat2?></td>
                                <td>
                                <?php
                                    $t= $row->qobla_bada; 
                                    ?>
                                    <b>B.</b><?php if ($t>0){
                                        echo "Ba'da Duhul";
                                    }else{
                                        echo "Qobla Duhul";
                                    }
                                    ?>
                                </td>
                                <td rowspan="2"><b>B.</b><?= $row->tgl_akta_cerai?></td>
                                <td rowspan="2"><b>B.</b><?= $row->tgl_kutipan_akta_nikah?></td>
                            </tr>
                            <!-- C -->
                            <tr >
                                <!-- <td></td>  -->
                                <td><b>C.</b><?= $row->pekerjaan?></td>
                                <td><b>C.</b><?= $row->pekerjaan2?></td>
                                <td><b>C.</b>F<?= $row->faktor_perceraian_id?></td> 
                                <!-- <td colspan="2"></td>  -->
                                <!-- <td></td> -->
                            </tr>
                            <?php
                                }
                            ?>
                       
                         </tbody>
                     </table>
                    </div>
               </body>
               </html>
