<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		check_role(['admin']);
		$data['judul'] = 'Users';
		$this->tmp->view('templates/admin/template','user/index', $data);
	}

	 public function upgradeUser()
	{
		$config = [
               'password' => [
                    'field'    => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required',
                     'errors'    => [
                        'required' => 'kolom {field} wajib diisi',
                     ]
                  ]
              ];
               $this->form_validation->set_rules($config);

               if ($this->form_validation->run() == false) {
	             $response = array(
	                'status' => 'error',
	                'message' => array(
	                    'password' => strip_tags(form_error('password')),
	                ),
	            );
        }else{
        	$where = [
        		'user_id' => userdata()->user_id
        	];
        	$input = $this->input->post(null,true);
        	$password = $input['password'];

        	if ($password == 'admin') {
        		$data['role'] = 'admin';
        		$this->main->update('users',$data,$where);
        		  $response = array(
	                'status' => 'success',
	                'message' => array(
	                    'password' => 'selamat akun anda berhasil diupgrade',
	                ),
	            );
        	}else if ($password == 'pimpinan') {
        		$data['role'] = 'pimpinan';
        		$this->main->update('users',$data,$where);
        		$response = array(
	                'status' => 'success',
	                'message' => array(
	                    'password' => 'selamat akun anda berhasil diupgrade',
	                ),
	            );
        	}else{
        		 $response = array(
	                'status' => 'error',
	                'message' => array(
	                    'password_salah' => 'maaf password anda salah',
	                ),
	            );
        	}
        }
         echo json_encode($response);
	}


	function get_ajax() {
        $def_avatar = $this->config->item('user_avatar_default');
        $list = $this->user->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no;
            if ($user->avatar) {
               $row[] = '<img src="'.base_url("assets/images/users/".$user->avatar).'" alt="gambar user" style="height: 80px;width: 80px;">';
            }else{
               $row[] = '<img src="'.base_url("assets/images/users/".$def_avatar).'" alt="gambar user" style="height: 80px;width: 80px;">';  
            }
            $row[] = $user->username;
            $row[] = $user->email;
            $row[] = $user->role;
            $row[] = '<div class="button-group">
  <a href="#" class="btn btn-danger" onClick="deleteuser('.$user->user_id.');"><i class="fa fa-trash"></i></a>
  <a href="#" class="btn btn-warning" onClick="getuser('.$user->user_id.');" ><i class="fa fa-edit"></i></a>
</div>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->user->count_all(),
                    "recordsFiltered" => $this->user->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

   function deleteuser(){
    	$id = $this->input->post('id',true);
    	$this->main->delete('users',['user_id' => $id]); 
    	$response = array(
	                'status' => 'success',
	            );
    	  echo json_encode($response);
    }

    function adduser(){
    	$input = $this->input->post(null,true);
    	$input['password'] = '12345678';
    	$input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
    	$this->main->insert('users',$input);
    	$response = array(
    		'status' => 'success',
    		'message' => setMsg('success','User','berhasil di tambah'),
    	);

    	echo json_encode($response);
    }

    function getuser(){
    	$id = $this->input->post('id',true);
     $where = [
     	'user_id' => $id
     ];

     $data = $this->main->get_where('users',$where);
     echo json_encode($data);
    }

    function edituser(){
    	$id = $this->input->post('user_id',true);
    	$input = $this->input->post(null,true);
        $data = [];
        $data['username'] = $input['username'];
        $data['email'] = $input['email'];
        $data['role'] = $input['role'];
     $where = [
     	'user_id' => $id
     ];


     if ($input['password'] != '') {
     	$data['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
     }

        $this->main->update('users',$data,$where);
    	$response = array(
    		'status' => 'success',
    		'message' => setMsg('success','User','berhasil di ubah'),
    	);

    	echo json_encode($response);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */




