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
    <p>Laporan Register Akte Cerai</p>
    </div>
    <!-- Tab -->
    <div class="col-sm-13">
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#cetak">Cetak</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active show" data-toggle="tab" href="#pdf">Export PDF</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active show" data-toggle="tab" href="#xls">Export Excel</a>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
<!-- kontent cetak -->
  <div class="tab-pane fade" id="cetak">
  <?php
                                                        echo form_open('laporan_ac');
                                                        ?>
                                                            <div class="form-group">
                                                            <label class="col-sm-1 control-label" for="form-field-1">
                                                                <!-- Dari Tanggal -->
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <input type="date" name="tanggal1" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 control-label" for="form-field-1">
                                                                <!-- Sampai Tanggal -->
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <input type="date" name="tanggal2" placeholder="" id="form-field-1" class="form-control">
                                                            </div>
                                                            <button type="submit" name="submit" class="btn btn-primary">Cetak</button>
</div>
</form>
  </div>
<!-- end kontent cetak -->
<!-- konten pdf -->
  <div class="tab-pane fade active show" id="pdf">
    <p> export pdf.</p>
  </div>
<!-- end kontent pdf -->
<!-- konten Excel -->
  <div class="tab-pane fade active show" id="xls">
    <p> export Excel.</p>
  </div>
<!-- end kontent xls -->
</div>
</div>

    <!-- End Tab -->
 <div class="bs-component">
   <table class="table table-hover">
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
        </tr>
        <tr>
            <td>B.Tanggal Ikrar</td>
            <td>B.Tanggal Akta Cerai</td>
            <td>B.Tanggal Putusan PA/Msy</td>
            <td>B.Tanggal Putusan PTA/Msy</td>
            <td>B.Tanggal Putusan MA-RI</td>
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
        </tr>
     <tbody>
                <?php
                $i = 1;
                foreach ($lap_akte->result() as $row) {
                ?>
        <tr>
             <td rowspan="2"><?php echo $i++?></td>
             <td rowspan="2"><?= $row->pihak1_text?></td>
             <td rowspan="2"><?= $row->pihak2_text?></td>
             <td>A.<?= $row->tgl_bht?></td>
             <td>A.<?= $row->nomor_akta_cerai?></td>
             <td>A.<?= $row->nomor_perkara?></td>
             <td>A.</td>
             <td>A.</td>
             <td rowspan="2"><?= $row->no_seri_akta_cerai ?></td>
        </tr>
        <tr>
             <td>B.<?= $row->tgl_ikrar?></td>
             <td>B.<?= $row->tgl_ac?></td>
             <td>B.<?= $row->tgl_put?></td>
             <td>B.</td>
             <td>B.</td>
        </tr>
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