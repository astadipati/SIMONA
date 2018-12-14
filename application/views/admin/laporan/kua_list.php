<style type="text/css">
     @page{
        size: 33cm 21.6cm;
        margin:5mm 5mm 5mm 5mm;
    }

    table {
        border-collapse:collapse;
    }

    table, th, td, tr {
        font-family: arial;
        border: 1px solid black;
    } 
    th {
        text-align:center;
    }
    /* table tr{
      font:normal 11px Tahoma, sans-serif;
    } */
    </style>
    <div class="container">
    <div class="page-header" id="banner">
    <p>Laporan KUA</p>
    </div>
    <!-- seting col md -->
    <div class ="row">
        <div class="col-sm-12">
           <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#cetak">Cetak</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pdf">Export PDF</a>
            </li> --> 
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#xls">Export Excel</a>
            </li>
            </ul>
            <div id="myTabContent" class="tab-content">
            <!-- kontent cetak -->
            <div class="tab-pane fade" id="cetak">
            <?php
            echo form_open('laporan_kua');
            ?>
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                Dari Tanggal
                </label>
                <div class="col-sm-3">
                    <input type="date" name="tanggal1" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                </div>
                    <label class="col-sm-3 control-label" for="form-field-1">
                    Sampai Tanggal
                    </label>
                <div class="col-sm-3">
                    <input type="date" name="tanggal2" placeholder="" id="form-field-1" class="form-control">
                </div>
                <div class="col-sm-3"><br>
                    <input type="text" name="kec" class="form-control" placeholder="Ketik Kecamatan">
                </div>
                <br>
                    <button type="submit" name="submit" class="btn btn-primary">Cetak</button>
                </div>
                </form>
            </div>
            <!-- end kontent cetak -->
            <!-- konten pdf -->
            <div class="tab-pane fade" id="pdf">
                <?php
                echo form_open('laporan_kua/cetak_pdf');
                ?>
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                    Dari Tanggal
                    </label>
                <div class="col-sm-3">
                    <input type="date" name="tanggal1" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                </div>
                    <label class="col-sm-3 control-label" for="form-field-1">
                    Sampai Tanggal
                    </label>
                <div class="col-sm-3">
                    <input type="date" name="tanggal2" placeholder="" id="form-field-1" class="form-control">
                    </div><br>
                <button type="submit" name="submit" class="btn btn-primary">Export PDF</button>
                </div>
                </form>
            </div>
            <!-- end kontent pdf -->
            <!-- konten Excel -->
            <div class="tab-pane fade" id="xls">
                <?php
                echo form_open('laporan_kua/cetak_xls');
                ?>
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-field-1">
                    Dari Tanggal
                    </label>
                    <div class="col-sm-3">
                    <input type="date" name="tanggal1" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                    </div>
                    <label class="col-sm-3 control-label" for="form-field-1">
                    Sampai Tanggal
                    </label>
                    <div class="col-sm-3">
                    <input type="date" name="tanggal2" placeholder="" id="form-field-1" class="form-control">
                    </div>
                    <div class="col-sm-3"><br>
                    <input type="text" name="kec" class="form-control" placeholder="Ketik Kecamatan">
                    </div><br>
                    <button type="submit" name="submit" class="btn btn-primary">Export Excel</button>
                    </div>
                </form>
            </div>
            <!-- end kontent xls -->
            </div>
    <!-- End Tab -->
    <hr>
        </div>
    </div>
    
 <div class="bs-component">
   <table class="table table-hover">
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
            <td rowspan="3"><b>KUA</b></td>
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
     <tbody>
     <?php
                //Kita akan melakukan looping sesuai dengan data yang dimiliki
                            $i = 1; //nantinya akan digunakan untuk pengisian Nomor
                            foreach ($lap_kua->result() as $row) {
                        ?>
                        <!-- mulai datanya -->
                            <tr                              >
                                <td><b>A.</b><?= $row->nomor_perkara?></td>
                                <td><b>A.</b><?= $row->nama?></td>
								<td><b>A.</b><?= $row->noiden1?></td>
                                
                                <td><b>A.</b><?= $row->nama2?></td>
                                <td><b>A.</b><?= $row->noiden2?></td>
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
        <!-- end data -->
             <?php
                 }
             ?> 
     </tbody>
   </table> 
   <?php
      echo $paging;
   ?>
 </div><!-- /example -->
</div>
</div>
</div>
<!-- ####################  sniff body   #################### -->