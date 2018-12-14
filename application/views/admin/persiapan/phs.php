
    <div class="container">
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
          <!-- <h1>SIMONA</h1> -->
          <p class="lead">Validasi <b><?php echo $total;?></b> Perkara PHS Kosong</p>
        </div>
      </div>
    </div>

 <div class="bs-component">
   <table class="table table-hover">
     <thead>
        <tr class="table-primary">
          <th>No</th>
          <th>Tanggal Daftar</th>
          <th>Jenis Perkara</th>
          <th>Nomor Perkara</th>
          <th>Data PMH</th>
          <th>Data Hakim</th>
          <th>Data Panitera<b>/</b>Panitera Pengganti</th>
          <th>Data JS/JSP</th>
          <th>Data PHS</th>
        </tr>
     </thead>
     <tbody>
            <?php
                 $i = $this->uri->segment('3') + 1;
                 foreach ($cekphs->result() as $row) {
             ?>
             <tr class="table-secondary">
                 <td><?php echo $i++?></td>
                 <td><?= $row->tanggal_pendaftaran?></td>
                 <td><?= $row->jenis_perkara_nama ?></td>
                 <td><?= $row->nomor_perkara ?></td>
                 <td><?= $row->penetapan_majelis_hakim ?></td>
                 <td><?= $row->majelis_hakim_nama ?></td>
                 <td><?= $row->pp ?></td>
                 <td><?= $row->js ?></td>
                 <td><?= $row->penetapan_hari_sidang ?></td>
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