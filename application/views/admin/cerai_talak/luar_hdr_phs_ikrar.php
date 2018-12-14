
    <div class="container">
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
          <!-- <h1>SIMONA</h1> -->
          <p class="lead">Validasi <b><?php echo $total;?></b> Perkara Putus CT Luar Hadir PHS Ikrar, mohon cek Tanggal PBT</p>
        </div>
      </div>
    </div>

 <div class="bs-component">
   <table class="table table-hover">
     <thead>
        <tr class="table-primary">
            <th>No</th>
            <th>Nomor Perkara</th>
            <th>Majelis</th>
            <th>Panitera/PP</th>
            <th>Jurusita/JSP</th>
            <th>Tanggal Putus</th>
            <th>Tanggal PBT</th>
            <th>Batas Waktu PHS Ikrar</th>
            <th>Tepat</th>
        </tr>
     </thead>
     <tbody>
            <?php
                 $i = $this->uri->segment('3') + 1;
                 foreach ($luarhdrphsikr->result() as $row) {
             ?>
             <tr class="table-secondary">
                 <td><?php echo $i++?></td>
                 <td><?= $row->nomor_perkara?></td>
                 <td><?= $row->hakim_nama?></td>
                 <td><?= $row->panitera_nama?></td>
                 <td><?= $row->jurusita_text?></td>
                 <td><?= $row->tanggal_putusan?></td>
                 <td><?= $row->tanggal_pbt?></td>
                 <td><?= $row->expire_phs_ikrar?></td>
                 <td><?= $row->selisih?></td>
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