 <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-11">
             <h1 class="bg_font">Post</h1>
           
      <div id="accordion" class="py-5">
      <div class="card border-0">
          <div class="card-header p-0 border-0" id="heading-239">
          <button class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse" data-target="#collapse-239" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>List Post</button>
        </div>
        <div id="collapse-239" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion" style="">
            <div class="card-body accordion-bodytable">

 <div class="row">
              <div class="col-md-12">
                <?= $this->session->flashdata('msg'); ?>
              </div>
            </div>

                            
   <div class="row justify-content-end">
    <div class="col-4 ">
        <div class="d-flex justify-content-end">
          <!-- Button trigger modal -->
<a  class="btn btn-primary btn-sm" href="<?= base_url('post/create'); ?>">
  <i class="fad fa-user-plus"></i> add post
</a>
    </div>
    
    </div>
  
  </div>

<div class="row justify-content-center mt-3">
  <div class="col-md-12">
           <table id="posttable" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Title</th>
                <th>Author </th>
                <th>Category</th>
                <th>Action</th>

            </tr>
        </thead>
      
    </table>
  </div>
</div>
           
            </div>
        </div>
    </div>
                     
      </div> 
            </div>


          </div>
        </div>
        


