 <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-11">
             <h1 class="bg_font">Tempat Usaha</h1>
           
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
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add_tem_usaha">
  <i class="fad fa-user-plus"></i> add data
</button>
    </div>
    
    </div>
  
  </div>

<div class="row justify-content-center mt-3">
  <div class="col-md-12">
           <table id="usahatable" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat </th>
                <th>Tanggal Lahir</th>
                <th>Perkerjaan</th>
                <th>Agama</th>
                <th>Usaha</th>
                <th>Alamat</th>
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
        



<!-- Modal -->
<div class="modal fade" id="modal-add_tem_usaha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" id="form-add_tem_usaha">
              
   <div class="form-group">
    <label for="nama">Nama</label>
		<input type="hidden" name="desa_id" value="<?= userdata()->desa_id; ?>">
    <input type="text" class="form-control" name="nama">
  </div>
    <div class="form-group">
    <label for="tempat">Tempat</label>
    <input type="text" class="form-control" name="tempat">
  </div>

      <div class="form-group">
    <label for="tempat">Tanggal Lahir</label>
    <input type="text" class="form-control" name="tanggal_lahir" autocomplete="off">
  </div>

     <div class="form-group">
    <label for="pekerjaan">Pekerjaan</label>
    <input type="text" class="form-control" name="pekerjaan">
  </div>

    <div class="form-group">
    <label for="agama">Agama</label>
    <input type="text" class="form-control" name="agama">
  </div>

   
    <div class="form-group">
    <label for="usaha">Usaha</label>
    <input type="text" class="form-control" name="usaha">
  </div>  
             
    <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" name="alamat">
  </div>
 
  
<p>Jenis Kelamin</p>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jenis_kelamin" value=laki-laki>
  <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan">
  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-edit_tem_usaha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" id="form-edit_tem_usaha">
       
   <div class="form-group">
    <label for="nama">Nama</label>
    <input type="hidden" class="form-control" name="id" id="id">
    <input type="text" class="form-control" name="nama" id="nama">
  </div>
    <div class="form-group">
    <label for="tempat">Tempat</label>
    <input type="text" class="form-control" name="tempat" id="tempat">
  </div>

      <div class="form-group">
    <label for="tempat">Tanggal Lahir</label>
    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off">
  </div>

     <div class="form-group">
    <label for="pekerjaan">Pekerjaan</label>
    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
  </div>

    <div class="form-group">
    <label for="agama">Agama</label>
    <input type="text" class="form-control" name="agama" id="agama">
  </div>

    <div class="form-group">
    <label for="usaha">Usaha</label>
    <input type="text" class="form-control" name="usaha" id="usaha">
  </div>  
             
    <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat">
  </div>
 
  
<p>Jenis Kelamin</p>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="radio1" value=laki-laki>
  <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="radio2" value="perempuan">
  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
