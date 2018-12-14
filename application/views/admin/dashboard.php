
    <div class="container">
    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-8 col-md-7 col-sm-6">
          <h1>SIMONA</h1>
          <p class="lead">Sistem Informasi Akte Cerai & Validasi Perkara</p>
        </div>
      </div>
    </div>

 <div class="bs-component">
   <table class="table table-hover">
     <thead>
        <tr class="table-primary">
            <th>Masuk</th>
            <th>Minutasi</th>
            <th>Sisa</th>
            <th>Nama Pengadilan</th>
            <th>Versi SIPP</th>
            <th>Kinerja</th>
        </tr>
     </thead>
     <tbody>
                  <?php
                  foreach ($dashboard->result() as $row) {
                  ?>
             <tr class="table-secondary">
                <td><?=$row->masuk ?><b></td>
                <td><?= $row->minutasi ?></td>
                <td><?= $row->sisa ?></td>
                <td><?= $row->namaPN ?></td>
                <td><?= $row->versiSIPP ?></td>
                <td><?= $row->kinerjaPN ?> %</td>
             </tr>
             <?php
                 }
             ?>
     </tbody>
   </table> 
   <br></br><br></br><br></br><br></br><br>
 </div><!-- /example -->
</div>
</div>
</div>
<!-- ####################  sniff body   #################### -->