<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/sidebar/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/bootstrap/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/navbar/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/navbar/css/card.css">
<!-- icon favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/Gianyar-icon.png'); ?>">

    <title><?= $judul; ?></title>
  </head>
  <body class="bg">


    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

  <?php $this->load->view('templates/public/_navbar')?>
    <div class="hero">
    <div style="height:100vh;width: 100%;" class="d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
      <div class="col-md-8 "><p class="titlehero show_title text-center"></p></div>
    </div>
  </div>
      
    </div>
  <?= $contents; ?>
<?php $this->load->view('templates/public/_footer')?>
