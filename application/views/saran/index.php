<div class="container">
  <div class="row justify-content-center" >


    <div class="col-md-8">
      <div class="card text-center mt-3">
      <div class="card-body">
         <h1 class="text-capitalize mb-3">Kumpulan Saran</h1>
          <hr class="my-3">
		  <?= $this->session->flashdata('msg'); ?>
			<div class="row justify-content-center">
				<?php foreach ($saran as $s) : ?>

					<div class="col-md-10 mt-3">

					<div class="card text-center">
					<div class="card-body">
						<div class="d-flex justify-content-end">
							<a href="<?= base_url('saran/download/'.$s->saran_id); ?>" class="btn btn-default btn-sm btn-info mr-2"><i class="fas fa-long-arrow-down"></i></a>
							<a href="<?= base_url('saran/delete/'.$s->saran_id); ?>"  onclick="return confirm('apakah saran ingin dihapus?');" class="btn btn-default btn-sm btn-danger"><i class="fa fa-times-circle"></i></a>
						</div>
					<h4 class="text-capitalize mb-3"><?= $s->username; ?></h4>
					<h5><?= $s->tanggal_saran; ?></h5>
          				<hr class="my-3">
						  <?= $s->isi_saran; ?>
					</div>
					</div>
						</div>
						<?php endforeach ?>
			</div>
        </div>
        </div>
    </div>




