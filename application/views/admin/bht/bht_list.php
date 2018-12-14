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
    <p>Laporan Perkara Telah Berkekuatan Hukum Tetap</p>
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
            echo form_open('bht');
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
                <br>
                    <button type="submit" name="submit" class="btn btn-primary">Cetak</button>
                </div>
                </form>
            </div>
            <!-- end kontent cetak -->
            <!-- konten Excel -->
            <div class="tab-pane fade" id="xls">
                <?php
                echo form_open('bht/cetak_xls');
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
     <tbody>
                <?php
                $i = $this->uri->segment('3') + 1;
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