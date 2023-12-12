 <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9">
              <div class="row">
          <div class="col-md-12">
            <h1 class="bg_font">Users</h1>
           
      <div id="accordion" class="py-5">
      <div class="card border-0">
          <div class="card-header p-0 border-0" id="heading-239">
          <button class="btn btn-link accordion-title border-0 collapse collapsed" data-toggle="collapse" data-target="#collapse-239" aria-expanded="false" aria-controls="#collapse-239"><i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>List Users </button>
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
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-adduser">
  <i class="fad fa-user-plus"></i> add user
</button>
    </div>
    
    </div>
  
  </div>

<div class="row justify-content-center mt-3">
  <div class="col-md-12">
           <table id="usertable" class="table table-striped table-bordered dt-responsive nowrap mt-3" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
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
<div class="modal fade" id="modal-adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('user/adduser'); ?>" id="form-adduser">
         <div class="form-group">
    <label for="username">Username</label>
		<input type="hidden" name="desa_id" value="<?= userdata()->desa_id; ?>">
    <input type="text" class="form-control" aria-describedby="emailHelp" name="username">
  </div>
       <div class="form-group">
    <label for="username">Email</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select class="form-control" name="role">
      <option value="admin">admin</option>
      <option value="pimpinan">pimpinan</option>
      <option value="member">member</option>
    </select>
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
<div class="modal fade" id="modal-edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('user/edituser'); ?>" id="form-edituser">
         <div class="form-group">
    <label for="username">Username</label>
    <input type="hidden" class="form-control" id="user_id" aria-describedby="emailHelp" name="user_id">
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
  </div>
       <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" aria-describedby="emailHelp" name="password">
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select class="form-control" name="role" id="role-menu">
      <option value="admin">admin</option>
      <option value="pimpinan">pimpinan</option>
      <option value="member">member</option>
    </select>
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
