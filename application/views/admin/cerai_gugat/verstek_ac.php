
    <div class="container">
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
          <!-- <h1>SIMONA</h1> -->
          <p class="lead">Validasi <b><?php echo $total;?></b> Perkara Putus CG Verstek Akte Cerai, Mohon Cek Tanggal BHT</p>
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
          <th>Tanggal BHT</th>
          <th>Batas Waktu Cetak AC</th>
          <th>Selisih</th>
        </tr>
     </thead>
     <tbody>
            <?php
                 $i = $this->uri->segment('3') + 1;
                 foreach ($cgvac->result() as $row) {
             ?>
             <tr class="table-secondary">
                 <td><?php echo $i++?></td>
                 <td><?= $row->nomor_perkara?></td>
                 <td><?= $row->hakim_nama?></td>
                 <td><?= $row->panitera_nama?></td>
                 <td><?= $row->jurusita_text?></td>
                 <td><?= $row->tanggal_putusan?></td>
				 <td><?= $row->tanggal_pbt?></td>
				 <td><?= $row->tanggal_bht?></td>
                 <td><?= $row->expire_ac?></td>
                 <td align="right"><b><?= $row->selisih?> Hari</b></td> 
                 
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