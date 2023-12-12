<div class="container " id="forum_saran">
	<div class="row justify-content-lg-center align-items-center" style="height: 100vh;">
	<div class="col-md-8">
	<?= $this->session->flashdata('msg'); ?>
	<form action="<?= base_url('saran/add'); ?>" method="post">
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Kotak Saran</h3>
            <textarea class="form-control" rows="4" name="isi_saran" placeholder="tuliskan disini..."></textarea>
        </div>
        <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary">Clear</button>
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="10" y1="14" x2="21" y2="3" />
                    <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
                </svg>
                Publish
            </button>
        </div>
    </div>
    </form>

	</div>
</div>
</div>

