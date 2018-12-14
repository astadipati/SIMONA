<?php
$filename = 'Data_bht'.date('dmYHis');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=".$filename .".xls");
?>
                    <table border="1" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Nomor Perkara</th>
                        <th>Nama Pemohon/Penggugat</th>
                        <th>Nama Termohon/Tergugat</th>
                        <th>Tanggal Putus</th>
                        <th>Tanggal BHT</th>
                    </tr>
                    <tr bgcolor="#f2f2f2" align="center">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                    </tr>
                    <?php
                    $i = 1; //nantinya akan digunakan untuk pengisian Nomor
                    foreach ($bht->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?= $row->tanggal_pendaftaran?></td>
                        <td><?= $row->nomor_perkara?></td>
                        <td><?= $row->pihak1_text?></td>
                        <td><?= $row->pihak2_text?></td>
                        <td><?= $row->tanggal_putusan?></td>
                        <td><?= $row->tanggal_bht?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </thead>
                </table>
               