<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 check_role(['admin','pimpinan','member']);
		$this->load->library('upload');
	}


	public function index()
	{

		$data['judul'] = "Dashboard";
		$this->tmp->view('templates/admin/template','dashboard', $data);
	}

	public function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $path = FCPATH . '/assets/images/posts/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
            $config['encrypt_name'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $path . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = $path . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url('assets/images/posts/') . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }

	public function createjson(){
		$data = [
			['no'     => 1,
			'nama'   => 'Wandi Febriandi',
			'alamat' => 'Jl. Karang Tineung'],
			[
			'no'     => 2,
			'nama'   => 'jamal',
			'alamat' => 'Jl. Citepus'
			]
		];
		
		
		
		$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
		$buatfile=file_put_contents('assets/images/setting.json', $jsonfile);
		
		if($buatfile){
			echo "Berhasil";
		}
	}


		
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
