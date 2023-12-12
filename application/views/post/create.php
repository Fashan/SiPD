 <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 bg_font text-center"><h1>Create New Post</h1></div>
          </div>

					
 <div class="row">
              <div class="col-md-12">
                <?= $this->session->flashdata('msg'); ?>
              </div>
            </div>

						
          <form action="<?= base_url('post/create'); ?>" method="Post" enctype="multipart/form-data">
            <div class="row justify-content-end">
              <div class="col-md-2">
                <a href="<?= base_url('post/index'); ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i>    back</a>
                 <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          <div class="row justify-content-center">
            <div class="col-md-8">           
      <div id="accordion" class="py-5">
      <div class="card border-0">
          <div class="card-header p-0 border-0" id="heading-239">
          <a class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>Post Content</a>
        </div>
        <div id="collapse-1" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion" style="">
            <div class="card-body accordion-bodytable">
                    
              
  <div class="form-group">
    <label for="post_title"><b>Post Title</b></label>
		<input type="hidden" name="desa_id" value="<?= userdata()->desa_id; ?>">
    <input type="text" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="judul post..." name="post_title">
  </div>
   <label for="summernote">Post Body</label>
                <textarea id="summernote" class="form-control" rows="6" name="post_body" placeholder="Post Body.."></textarea>
 
            </div>
        </div>
    </div>
                     
      </div> 
            </div>



            <div class="col-md-4">
      
      <div id="accordion" class="py-5">
      <div class="card border-0">
          <div class="card-header p-0 border-0" id="heading-239">
          <a class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>Post Info</a>
        </div>
        <div id="collapse-1" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion" style="">
            <div class="card-body accordion-bodytable">

               <div class="form-group">
    <label for="category"><b>Category</b></label>
    <select class="form-control" id="category" name="category_id">
      <option value="" selected="">pilih category</option>
      <?php foreach ($category as $c): ?>
        <option value="<?= $c->category_id; ?>"><?= $c->category_name; ?></option>
      <?php endforeach ?>
    </select>
  </div>


   <div class="form-group">
                    <label class="form-label" for="post_thumbnail"><b>Post Thumbnail</b></label>
                    <div class="custom-file">
                        <input accept="image/*" type="file" class="custom-file-input" id="post_thumbnail" name="post_thumbnail" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="post_thumbnail" id="filename">Choose file</label>
                    </div>
                </div>


                    </form>
            </div>
        </div>
    </div>
                     
      </div> 
            </div>



          </div>
        </div>
        
