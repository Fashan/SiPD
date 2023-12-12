<html lang="en">
<head>

  <meta charset="UTF-8">
  



  <title><?= $judul; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url(); ?>assets/dist/auth/raleway.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/dist/auth/bootstrap.min.css" rel="stylesheet">
<!-- icon favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/Gianyar-icon.png'); ?>">

<link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/auth/style.css">

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>
<body class="bg">
  <?= $contents; ?>
  <?php $this->load->view('templates/auth/_footer'); ?>


       


    


