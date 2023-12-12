<div class="site-section">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				 <h1 class="bg_font text-center">Category</h1>
			</div>
		</div>

		<div class="row">
              <div class="col-md-12">
                <?= $this->session->flashdata('msg'); ?>
              </div>
            </div>

		
			

			<div class="row justify-content-center">
				<div class="col-md-3">

					<div id="accordion" class="py-5">
						<div class="card border-0">
							<div class="card-header p-0 border-0" id="heading-239">
								<a class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse"
									data-target="#collapse-2" aria-expanded="false" aria-controls="#collapse-239"><i
										class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i><div id="form-title">New Category</div></a>
							</div>
							<div id="collapse-2" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion"
								style="">
								<div class="card-body accordion-bodytable">
								<form action="" method="Post">
									<div class="form-group">
										<label for="category_name" class="form-label required">Category</label>
										<input type="hidden" name="category_id">
										<input type="hidden" name="desa_id" value="<?= userdata()->desa_id; ?>">
										<input value="" type="text" name="category_name"
											id="category_name" class="form-control" placeholder="Category Name...">
									</div>
									<div class="form-group">
										<label for="category_desc" class="form-label">Description</label>
										<textarea name="category_desc" id="category_desc" rows="3" class="form-control"
											placeholder="Category Description..."></textarea>
									</div>
								</div>
								<div class="card-footer text-right">
                <button type="reset" id="btn-cancel" class="btn btn-secondary">Clear</button>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l5 5l10 -10" /></svg>
                    Save
                </button>
</form>
            </div>
							</div>
						</div>
					</div>

				</div>

			<div class="col-md-8">

<div id="accordion" class="py-5">
	<div class="card border-0">
		<div class="card-header p-0 border-0" id="heading-239">
			<a class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse"
				data-target="#collapse-2" aria-expanded="false" aria-controls="#collapse-239"><i
					class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>List Category</a>
		</div>
		<div id="collapse-2" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion"
			style="">
			<div class="card-body accordion-bodytable">
			<table id="categorytable" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
			</div>

		</div>
	</div>
</div>

</div>
			</div>
	</div>
</div>
