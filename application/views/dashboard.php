<div class="container">
	<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
	<div class="jumbotron mt-3">
  <h1 class="display-4">Hello, <?= userdata()->username; ?></h1>
  <p class="lead"><marquee behavior="" direction="right"><i class="far fa-clouds"></i> Selamat datang di SIPD (Sistem Informasi Profile Daerah) <i class="far fa-clouds"></i></marquee></p>
  <hr class="my-4">
  <p>Click untuk melihat Post</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?= base_url('post/list'); ?>" role="button">Here</a>
  </p>
</div>
	</div>
</div>
