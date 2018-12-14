
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
  <!-- ####################  sniff end header   #################### -->
  <!-- ####################  sniff body   #################### -->
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
      <a href="<?php echo site_url('dashboard')?>">
                          <span class="navbar-brand">Dashboard</a></span> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Penerimaan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url()?>penerimaan/para_pihak">Para Pihak  <span class="badge badge-pill badge-danger"> 1</span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>penerimaan/gugatan">Gugatan  <span class="badge badge-pill badge-danger"> 1</span></a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Persiapan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pmh">Penunjukan PMH  <span class="badge badge-pill badge-danger"> 1</span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/pp">Penunjukan PP <span class="badge badge-pill badge-danger"> 1</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persiapan/phs">Penetapan PHS  <span class="badge badge-pill badge-danger"> 1</span></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Persidangan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url()?>persidangan/j_sidang">Jadwal Sidang </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persidangan/tgl_putus">Tanggal Putus  <span class="badge badge-pill badge-danger"> 1</span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>persidangan/doc_put">E-doc Putusan  <span class="badge badge-pill badge-danger"> 1</span></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Gugatan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url()?>persidangan/j_sidang">Jadwal Sidang </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url()?>persidangan/tgl_putus">Tanggal Putus  <span class="badge badge-pill badge-danger"> 1</span></a>
                <a class="dropdown-item" href="<?php echo base_url()?>persidangan/doc_put">E-doc Putusan  <span class="badge badge-pill badge-danger"> 1</span></a>
              </div>
            </li>

          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="https://wrapbootstrap.com/?ref=bsw" target="_blank">Nama PA</a>
            </li>
          </ul>

        </div>
      </div>
    </div>

