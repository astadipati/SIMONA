
    <div class="container">
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
          <!-- <h1>SIMONA</h1> -->
          <p class="lead">Validasi <b><?php echo $total;?></b> Perkara Putus Belum Transaksi Materai/Redaksi</p>
        </div>
      </div>
    </div>

 <div class="bs-component">
   <table class="table table-hover">
     <thead>
        <tr class="table-primary">
            <th>No</th>
            <th>Nomor Perkara</th>
            <th>Pemohon/Penggugat</th>
            <th>Termohon/Tergugat</th>
            <th>Nama Hakim</th>
            <th>Nama PP</th>
            <th>Tanggal Putusan</th>
            <th>Tanggal Transaksi</th>
        </tr>
     </thead>
     <tbody>
            <?php
                 $i = $this->uri->segment('3') + 1;
                 foreach ($puttrans->result() as $row) {
             ?>
             <tr class="table-secondary">
                 <td><?php echo $i++?></td>
                 <td><?= $row->nomor_perkara?></td>
                 <td><?= $row->pihak1_text?></td>
                 <td><?= $row->pihak2_text?></td>
                 <td><?= $row->hakim_nama?></td>
                 <td><?= $row->panitera_nama?></td>
                 <td><?= $row->tanggal_putusan?></td>
                 <td> - </td>
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