<div class="container mt-3" id="home">
	<!-- Page title -->
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <!-- Page pre-title -->
			<h2 class="page-title bg_font">
				All Post
            </h2>

			<div class="d-flex justify-content-end mt-3">
	

<form form class="form-inline mr-3" method="GET" action="">
<div class="form-group">
    <select class="form-control" id="category">
		<option value="">Category</option>
	<?php foreach (get_category() as $category) : ?>
		<option value="<?=  $category->category_id; ?>"><?= $category->category_name; ?></option>
	<?php endforeach ?>
	<option value="">show all</option>
    </select>
  </div>
</form>

			<form class="form-inline my-2 my-lg-0" method="GET" action="">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
    </form>
	

	
			</div>
        </div>
    </div>
</div>


<div id="post_kosong"></div>


<br><br>
<ul class="card-wrapper listpost mt-3" id="tampil_post">

</ul>

<div class="row justify-content-center mt-4">
    <div class="col-3">
		<div class="d-flex justify-content-center">
			<div id="pagination">
			</div>
		</div>
    </div>
</div>
</div>
