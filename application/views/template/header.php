
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    foreach ($dashboard->result() as $row) {
	?>
    <meta charset="utf-8">
    <title>SIMONA <?= $row->namaPN ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/yeti/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/yeti/custom.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/footer-distributed.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" />
  
    <script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
      <a class="navbar-brand" href="<?php echo base_url()?>dashboard">
      <img src="<?php echo base_url()?>assets/gambar/instansi/logo.png?>" width=45></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Penerimaan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>penerimaan">Para Pihak
                <?php
                if ($pkosong > 0 ){
                  echo '<span class="badge badge-pill badge-danger">'.$pkosong.'</span></a>';
                }else
                  echo '<span class="badge badge-pill badge-success">'.$pkosong.'</span></a>';
                ?> 
                <a class="dropdown-item" href="<?php echo base_url()?>penerimaan/e_doc">E-Doc Gugatan 
                <?php
                if ($edockosong > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$edockosong.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$edockosong.'</span></a>';
                ?>
               </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Persiapan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pmh">Penunjukan PMH 
                <?php
                if ($pmhkosong > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$pmhkosong.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$pmhkosong.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $pmhkosong;?></span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pp">Penunjukan PP
                <?php
                if ($ppkosong > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$ppkosong.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$ppkosong.'</span></a>';
                ?> 
                <!-- <span class="badge badge-pill badge-danger"><?php echo $ppkosong;?></span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/js">Penunjukan JS
                <?php
                if ($jskosong > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$jskosong.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$jskosong.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $jskosong;?></span></a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/phs">Penetapan PHS 
                <?php
                if ($phskosong > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$phskosong.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$phskosong.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $phskosong;?></span></a> -->
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Sidang <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="<?php echo base_url()?>sidang">Jadwal Sidang </span></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putusan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <!-- <a class="dropdown-item" href="<?php echo base_url()?>sidang/j_sidang">Jadwal Sidang  <span class="badge badge-pill badge-danger"> 1</span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>putus">Putus & Redaksi
                <?php
                if ($cekputus > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$cekputus.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$cekputus.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $cekputus;?></span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>putus/minut">Putus Minutasi
                <?php
                if ($putminut > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$putminut.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$putminut.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $cekputus;?></span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>putus/put_transaksi">Redaksi/Meterai
                <?php
                if ($put_trans > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$put_trans.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$put_trans.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $cekputus;?></span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>putus/e_put">E-Doc Put
                <?php
                if ($docputus > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$docputus.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$docputus.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $docputus;?></span></a> -->
                <a class="dropdown-item" href="<?php echo base_url()?>putus/e_anon">E-Doc Anon
                <?php
                if ($anonputus > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$anonputus.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$anonputus.'</span></a>';
                ?>
                <!-- <span class="badge badge-pill badge-danger"><?php echo $anonputus;?></span></a> -->
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Data BHT<span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>#">Permohonan</a>
                <a class="dropdown-item" href="<?php echo base_url()?>bht">Gugatan</span></a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus Hadir <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat">CG AC
              <?php
                if ($hdrcg > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$hdrcg.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$hdrcg.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $hdrcg;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak">CT PHS Ikrar
              <?php
                if ($hdrct > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$hdrct.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$hdrct.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $hdrct;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/hadir_gugur">CT Gugur
              <?php
                if ($hdrctgugur > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$hdrctgugur.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$hdrctgugur.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $hdrctgugur;?></span></a> -->
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus Luar Hadir <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div> 
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/luar_hadir_pbt">CG PBT
              <?php
                if ($lhdrcgpbt > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$lhdrcgpbt.'</span></a>';
                }else 
                echo '<span class="badge badge-pill badge-success">'.$lhdrcgpbt.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $lhdrcgpbt;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/luar_hadir_ac">CG Akte Cerai
              <?php
                if ($lhdrcgac > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$lhdrcgac.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$lhdrcgac.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $lhdrcgac;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/luar_hadir_pbt">CT PBT
              <?php
                if ($lhdrctpbt > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$lhdrctpbt.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$lhdrctpbt.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $lhdrctpbt;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/luar_hadir_phs_ikrar">CT PHS Ikrar
              <?php
                if ($lhdrctphs > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$lhdrctphs.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$lhdrctphs.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $lhdrctphs;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/luar_hadir_gugur">CT Gugur
              <?php
                if ($lhdrctgugur > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$lhdrctgugur.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$lhdrctgugur.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $lhdrctgugur;?></span></a> -->
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus Verstek <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/verstek_pbt">CG PBT
              <?php
                if ($vcgpbt > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$vcgpbt.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$vcgpbt.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $vcgpbt;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/verstek_ac">CG Akte Cerai
              <?php
                if ($vcgac > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$vcgac.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$vcgac.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $vcgac;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/verstek_pbt">CT PBT
              <?php
                if ($vctpbt > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$vctpbt.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$vctpbt.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $vctpbt;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/verstek_phs_ikrar">CT PHS Ikrar
              <?php
                if ($vctphs > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$vctphs.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$vctphs.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $vctphs;?></span></a> -->
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/verstek_gugur">CT Gugur
              <?php
                if ($vctgugur > 0){
                  echo '<span class="badge badge-pill badge-danger">'.$vctgugur.'</span></a>';
                }else 
                  echo '<span class="badge badge-pill badge-success">'.$vctgugur.'</span></a>';
                ?>
              <!-- <span class="badge badge-pill badge-danger"><?php echo $vctgugur;?></span></a> -->
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Laporan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url()?>laporan_ac">Register AC</a>
                <a class="dropdown-item" href="<?php echo base_url()?>laporan_kua">KUA</a>
              </div>
            </li>
 
          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?= $row->namaPN ?></a>
            </li>
          </ul>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
