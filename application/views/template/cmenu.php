
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMONA</title>
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
        <a href="<?php echo base_url()?>dashboard" class="navbar-brand">Gmb</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Penerimaan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>penerimaan">Para Pihak  <span class="badge badge-pill badge-danger"><?php echo $pkosong;?></span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>penerimaan/e_doc">E-Doc Gugatan <span class="badge badge-pill badge-danger"><?php echo $edockosong;?></span></a>
               </div>
            </li> 

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Persiapan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pmh">Penunjukan PMH  <span class="badge badge-pill badge-danger"><?php echo $pmhkosong;?></span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pp">Penunjukan PP <span class="badge badge-pill badge-danger"><?php echo $ppkosong;?></span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pp">Penunjukan JS <span class="badge badge-pill badge-danger"><?php echo $jskosong;?></span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/phs">Penetapan PHS  <span class="badge badge-pill badge-danger"><?php echo $phskosong;?></span></a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Sidang <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="<?php echo base_url()?>sidang/j_sidang">Jadwal Sidang </a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>sidang/putusan">Putus & Redaksi <span class="badge badge-pill badge-danger"><?php echo $cekputus;?></span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>sidang/e_put">E-Doc Put  <span class="badge badge-pill badge-danger"><?php echo $docputus;?></span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>sidang/e_anon">E-Doc Anon <span class="badge badge-pill badge-danger"><?php echo $anonputus;?></span></a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus Hadir <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/hdr_ac">CG AC <span class="badge badge-pill badge-danger"><?php echo $hdrcg;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/hdr_phs_ikrar">CT PHS Ikrar  <span class="badge badge-pill badge-danger"><?php echo $hdrct;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/hdr_gugur">CT Gugur <span class="badge badge-pill badge-danger"><?php echo $hdrctgugur;?></span></a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus Luar Hadir <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div> 
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/lh_pbt">CG PBT <span class="badge badge-pill badge-danger"><?php echo $lhdrcgpbt;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/lh_ac">CG Akte Cerai  <span class="badge badge-pill badge-danger"><?php echo $lhdrcgac;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/lh_pbt">CT PBT <span class="badge badge-pill badge-danger"><?php echo $lhdrctpbt;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/lh_phs_ikrar">CT PHS Ikrar <span class="badge badge-pill badge-danger"><?php echo $lhdrctphs;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/lh_gugur">CT Gugur <span class="badge badge-pill badge-danger"><?php echo $lhdrctgugur;?></span></a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Putus Verstek <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/v_pbt">CG PBT <span class="badge badge-pill badge-danger"><?php echo $vcgpbt;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_gugat/v_ac">CG Akte Cerai  <span class="badge badge-pill badge-danger"><?php echo $vcgac;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/v_pbt">CT PBT <span class="badge badge-pill badge-danger"><?php echo $vctpbt;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/v_phs_ikrar">CT PHS Ikrar <span class="badge badge-pill badge-danger"><?php echo $vctphs;?></span></a>
              <a class="dropdown-item" href="<?php echo base_url()?>cerai_talak/v_gugur">CT Gugur <span class="badge badge-pill badge-danger"><?php echo $vctgugur;?></span></a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Laporan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url()?>assets/bootstrap/yeti//bootstrap.min.css">Register AC</a>
                <a class="dropdown-item" href="<?php echo base_url()?>assets/bootstrap/yeti/bootstrap.css">KUA</a>
              </div>
            </li>

          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Nama PA</a>
            </li>
          </ul>

        </div>
      </div>
    </div>
