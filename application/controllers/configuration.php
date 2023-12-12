<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Configuration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');

        check_session();
    }

	public function index(){
		$data['judul'] = "Setting";
		$this->tmp->view('templates/admin/template', 'config/setting', $data);
	}
	
	public function get_data()
	{
		$data = file_get_contents('assets/setting.json');
		echo $data;             
	}

	
    private function _configUpload($path)
    {
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = FALSE;
        $this->upload->initialize($config);
    }

    private function _compressImg($path, $name)
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = $path . $name;
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = FALSE;
        $config['width']            = "150";
        $config['height']           = "150";
        $config['quality']          = '50%';
        $config['new_image']        = $path . $name;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->image_lib->crop();
    }

    public function account()
    {
        $data['judul'] = "Account";

        $uname = $this->input->post('username', true) == userdata()->username ? "" : "|is_unique[users.username]";

        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[3]" . $uname);

        if ($this->form_validation->run() == false) {
            $this->tmp->view("templates/admin/template","config/account", $data);
        } else {
            $input = $this->input->post(null, true);

            if (empty($_FILES['avatar']['name'])) {
                $input['avatar'] = userdata()->avatar;
            } else {
                $path = FCPATH . 'assets/images/users/';
                $this->_configUpload($path);

                if ($this->upload->do_upload('avatar')) {
                    $gbr = $this->upload->data();

                    //Compress Image
                    $this->_compressImg($path, $gbr['file_name']);

                    $input['avatar'] = $gbr['file_name'];
                } else {
                    setFlashMsg('danger', "Failed upload image : " . $this->upload->display_errors(),'');
                    redirect('configuration/account');
                }

                $oldimg = userdata()->avatar;
                if ($oldimg) {
                    if (is_file($path . $oldimg)) {
                        unlink($path . $oldimg);
                    }
                }
            }

            $this->main->update('users', $input, ['user_id' => userdata()->user_id]);

            setFlashMsg("success", 'Account has been updated!','');
            redirect('configuration/account');
        }
    }
	public function change_background(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['background']['bg'] = $input['bg'];
		$json['background']['color'] = $input['color'];
		 $jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($json);
	}

	public function email_public(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['email_public'] = $input['email'];
		 $jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($response);
	}

	public function wa_public(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['wa'] = $input['wa'];
		 $jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($response);
	}

	public function fb_public(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['link_fb'] = $input['fb'];
		 $jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($response);
	}

	public function ig_public(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['link_ig'] = $input['ig'];
		 $jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($response);
	}

	public function twiter_public(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['link_twiter'] = $input['twiter'];
		 $jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($response);
	}

	
	public function title_public(){
		$input = $this->input->post(null,true);
		$data = file_get_contents('assets/setting.json');
		$json = json_decode($data,true);
		$json['title_hero'] = $input['title_hero'];
		$jsonfile = json_encode($json, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/setting.json', $jsonfile);
		if($buatfile){
			$response = "Berhasil";
		}
echo json_encode($response);
	}


	
	public function ubah_hero(){
		if (!empty($_FILES['gambar_hero']['name'])) {
            $data = file_get_contents('assets/setting.json');
			$json = json_decode($data,true);
			$oldimg = $json['gambar_hero'];
			$path = FCPATH . 'assets/images/hero_img/';

            if ($oldimg) {
                if (is_file($path . $oldimg)) {
                    unlink($path . $oldimg);
                }
            }
			$this->_configUpload($path);

			if ($this->upload->do_upload('gambar_hero')) {
				$gbr = $this->upload->data();
				$json['gambar_hero'] = $gbr['file_name'];
				$jsonfile = json_encode($json, JSON_PRETTY_PRINT);
				$buatfile=file_put_contents('assets/setting.json', $jsonfile);
				if($buatfile){
					$response = $json['gambar_hero'];
				}
			} else {
				$response = "gagal";
			}
		}
echo json_encode($response);
	}



    // public function change_password()
    // {
    //     $data['title'] = "Change Password";

    //     $this->form_validation->set_rules('old_password', 'Old Password', 'required');
    //     $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[4]|alpha_dash');
    //     $this->form_validation->set_rules('password', 'Confirm Password', 'required|matches[new_password]');

    //     if ($this->form_validation->run() == false) {
    //         admin_template("config/change_password", $data);
    //     } else {
    //         $input = $this->input->post(null, false);
    //         $where = ['user_id' => userdata()->user_id];

    //         $get_password = $this->main->get_where('users', $where)->password;
    //         if (password_verify($input['old_password'], $get_password)) {
    //             $this->main->update('users', [
    //                 'password' => password_hash($input['password'], PASSWORD_DEFAULT)
    //             ], $where);

    //             setMsg('success', 'Password has changed.');
    //         } else {
    //             setMsg('danger', "Old Password Not Same!");
    //         }
    //         redirect('configuration/change_password');
    //     }
    // }
}
