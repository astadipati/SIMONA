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
    <p>Agenda sidang hari Ini : 
    <?php
    echo date("d M Y");
    ?>
    </p>
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
            echo form_open('sidang/jadwal_sidang');
            ?>
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                Pilih Tanggal
                </label>
                <div class="col-sm-4">
                    <input type="date" name="tanggal" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                </div><br>
                <div class="col-sm-4">
                <select name="majelis" id="majelis" class="form-control">
                    <option  selected="">Pilih Majelis</option>
                    <?php
                    if (count($majelis)) {
                        foreach ($majelis as $list) {
                            echo "<option ". $list['hakim_id'] . ">" . $list['hakim_nama'] . "</option>";
                        }
                    }
                    ?>
                  </select>
                    </div><br>
                    <button type="submit" name="submit" class="btn btn-primary">Cetak</button>
                </div>
                </form>
            </div>
            <!-- end kontent cetak -->
            <!-- konten pdf -->
            <div class="tab-pane fade" id="pdf">
                <?php
                echo form_open('sidang/cetak_pdf');
                ?>
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                Pilih Tanggal
                </label>
                <div class="col-sm-4">
                    <input type="date" name="tanggal1" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                </div><br>
                <div class="col-sm-4">
                <select class="custom-select" name='majelis'>
                    <option selected="">Pilih Majelis</option>
                    <?php
                    if (count($majelis)) {
                        foreach ($majelis as $list) {
                            echo "<option value='". $list['id'] . "'>" . $list['hakim_nama'] . "</option>";
                        }
                    }
                    ?>
                  </select>
                    </div><br>
                <button type="submit" name="submit" class="btn btn-primary">Export PDF</button>
                </div>
                </form>
            </div>
            <!-- end kontent pdf -->
            <!-- konten Excel -->
            <div class="tab-pane fade" id="xls">
            <?php
            echo form_open('sidang/cetak_xls');
            ?>
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">
                Pilih Tanggal
                </label>
                <div class="col-sm-4">
                    <input type="date" name="tanggal" value="dd-mm-yyyy" id="form-field-1" class="form-control">
                </div><br>
                <div class="col-sm-4">
                <select name="majelis" id="majelis" class="form-control">
                    <option  selected="">Pilih Majelis</option>
                    <?php
                    if (count($majelis)) {
                        foreach ($majelis as $list) {
                            echo "<option ". $list['hakim_id'] . ">" . $list['hakim_nama'] . "</option>";
                        }
                    }
                    ?>
                  </select>
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
            <th align="justify">No</th>
            <th>Nomor Perkara</th>
            <th>Ruang</th>
            <th>Majelis</th>
            <th>Nama Pemohon / Penggugat</th>
            <th>Nama Termohon / Tergugat</th>
            <th>Agenda</th>
            <!-- <th rowspan="2">No Seri Akta Cerai</th> -->
        </tr>
        <tr bgcolor="#f2f2f2" align="center">
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <!-- <td>7</td>
            <td>8</td>
            <td>9</td> -->
        </tr>
     <tbody>
                <?php
                $i = 1;
                foreach ($datasid->result() as $row) {
                ?>
        <tr>
             <td><?php echo $i++?></td>
             <td><?= $row->nomor_perkara?></td>
             <td><?= $row->ruangan?></td>
             <td><?= $row->hakim_nama?></td>
             <td><?= $row->pihak1_text?></td>
             <td><?= $row->pihak2_text?></td>
             <td><?= $row->agenda?></td>
             
        </tr>
             <?php
                 }
             ?> 
     </tbody>
   </table> 
 </div><!-- /example -->
</div>
</div>
</div>
<!-- ####################  sniff body   #################### -->