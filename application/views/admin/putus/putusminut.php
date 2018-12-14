
    <div class="container">
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
          <!-- <h1>SIMONA</h1> -->
          <p class="lead">Validasi <b><?php echo $total;?></b> Perkara Putus Belum Minutasi</p>
        </div>
      </div>
    </div>

 <div class="bs-component">
   <table class="table table-hover">
     <thead>
        <tr class="table-primary">
            <th>No</th>
            <th>Nomor Perkara</th>
            <th>Nama Hakim</th>
            <th>Nama PP</th>
            <th>Tanggal Putusan</th>
            <th>Status Putusan</th>
            <th>Amar</th>
            <th>Tanggal Minutasi</th>
        </tr>
     </thead>
     <tbody>
            <?php
                 $i = $this->uri->segment('3') + 1;
                 foreach ($putminut->result() as $row) {
             ?>
             <tr class="table-secondary">
                 <td><?php echo $i++?></td>
                 <td><?= $row->nomor_perkara?></td>
                 <td><?= $row->hakim_nama?></td>
                 <td><?= $row->panitera_nama?></td>
                 <td><?= $row->tanggal_putusan?></td>
                 <td><?= $row->status_putusan_nama?></td>
                 <td><?= $row->amar_putusan?></td>
                 <td><?= $row->tanggal_minutasi?></td>
             </tr>
             <?php
                 }
             ?>
     </tbody>
   </table> 
   <?php
      echo $paging;
   ?>
 </div>
</div>
</div>
</div>
<!-- ####################  sniff body   #################### -->