 <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 bg_font text-center"><h1>Profile</h1></div>
          </div>
          
            
          <div class="row justify-content-center">
        

            <div class="col-md-4">
      
      <div id="accordion" class="py-5">
      <div class="card border-0">
          <div class="card-header p-0 border-0" id="heading-239">
          <a class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>Account</a>
        </div>
        <div id="collapse-2" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion" style="">
            <div class="card-body accordion-bodytable">
 <div class="row">
              <div class="col-md-12">
                <?= $this->session->flashdata('msg'); ?>
              </div>
            </div>
<form action="<?= base_url('configuration/account'); ?>" method="Post" enctype="multipart/form-data">

    <div class="form-group">
    <label for="username"><b>Username</b></label>
    <input type="text" class="form-control" name="username" value="<?= userdata()->username; ?>">
  </div>

	<div class="form-group">
    <label for="username"><b>Desa</b></label>
		<select class="form-control desa" id="exampleFormControlSelect1" name="desa_id">
</select>
  </div>

  <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input type="text" class="form-control" name="email" value="<?= userdata()->email; ?>">
  </div>

   <div class="form-group">
                    <label class="form-label" for="post_thumbnail"><b>Avatar</b></label>
                    <div class="custom-file">
                       <input type="file" name="avatar" class="custom-file-input" id="avatar" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                        <label class="custom-file-label" for="post_thumbnail" id="filename">Choose file</label>
                    </div>
                </div>

                <a href="<?= base_url('dashboard'); ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i>back</a>
                 <button type="submit" class="btn btn-primary">save</button>
                    </form>
            </div>
        </div>
    </div>
                     
      </div> 
            </div>



          </div>
        </div>
        
