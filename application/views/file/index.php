<div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9">
              <div class="row">
          <div class="col-md-12">
            <h1 class="bg_font">Data Desa</h1>
           
      <div id="accordion" class="py-5">
      <div class="card border-0">
          <div class="card-header p-0 border-0" id="heading-239">
          <button class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse" data-target="#collapse-239" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>List Data</button>
        </div>
        <div id="collapse-239" class="collapse show" aria-labelledby="heading-239" data-parent="#accordion" style="">
            <div class="card-body accordion-bodytable">

 <div class="row">
              <div class="col-md-12">
                <div class="pesan"></div>
              </div>
            </div>

                            
   <div class="row justify-content-end">
    <div class="col-4 ">
        <div class="d-flex justify-content-end">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-upload_file">
  <i class="fad fa-user-plus"></i> Upload file
</button>
    </div>
    
    </div>
  
  </div>

<div class="row justify-content-center mt-3">
  <div class="col-md-12">
           <table id="filetable" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>File</th>
                <th>Date Uploaded</th>
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


          </div>
        </div>
        



<!-- Modal -->
<div class="modal fade" id="modal-upload_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

              
	  <div class="form-group">
                    <label class="form-label" for="file"><b>File</b></label>
                    <div class="custom-file">
										    <input type="hidden" name="desa_id" value="<?= userdata()->desa_id; ?>">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="fileToUpload" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename">Choose file</label>
                    </div>
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closefile">Close</button>
        <button type="button" class="btn btn-primary" onclick="upload_file()">Upload</button>

      </div>
    </div>
  </div>
</div>
