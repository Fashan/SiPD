<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class File extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "assets/files/";
	}
	
	public function index()
	{
		check_role(['admin']);
		$data['judul'] = "Files";
		$this->tmp->view('templates/admin/template','file/index',$data);			
	}

	
	function get_ajax() {
		$list = $this->file->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $file) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $file->file_name;
			$row[] = $file->file_date;
			$row[] = '<div class="button-group">
			<a href="#" onclick="download_file('.$file->file_id.');" class="btn btn-default btn-sm btn-info" ><i class="fas fa-file-download"></i></a>
	<a href="#" onclick="delete_file('.$file->file_id.');" class="btn btn-default btn-sm btn-danger"><i class="fa fa-trash"></i></a>
	</div>';
			$row[] = '<div class="button-group">
			<a href="#" onclick="download_file('.$file->file_id.');" class="btn btn-default btn-sm btn-info" ><i class="fas fa-file-download"></i></a>
	</div>';
			$data[] = $row;
		}
		$output = array(
					"draw" => @$_POST['draw'],
					"recordsTotal" => $this->file->count_all(),
					"recordsFiltered" => $this->file->count_filtered(),
					"data" => $data,
				);
		// output to json format
		echo json_encode($output);
	}






	private function _configUpload()
    {
        $config['upload_path'] = $this->path;
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
        $this->upload->initialize($config);
    }


	function upload(){
		$input['file_date']  = date('Y-m-d');
		$input['file_name']  = "";
		$input["desa_id"] = $this->input->post('user_desa_id');
		 // file Upload
		 if (!empty($_FILES['file']['name'])) {
            $this->_configUpload();

            if ($this->upload->do_upload('file')) {
                $file = $this->upload->data();
                $input['file_name'] = $file['file_name'];
				$this->main->insert('files',$input);
				
				$response = array(
					'status' => 'success',
					'message' => setMsg('success','File','berhasil di Upload'),
				);
            } else {
				$response = array(
					'status' => 'error',
					'message' => setMsg('danger', "Failed to upload file : " . $this->upload->display_errors(),''),
				);
                

            }
        }else{
			$response = array(
				'status' => 'error',
				'message' => setMsg('danger','File','belum di upload'),
			);
		}
        echo json_encode($response);
    }


	function delete(){
		$id = $this->input->post('id');
		$filedata = $this->main->get_where('files',['file_id' => $id]);
		$file = $this->path . $filedata->file_name;
		if (is_file($file)) {
			unlink($file);
			$response = array(
				'status' => 'success',
			);
			$this->main->delete('files',['file_id' => $id]);
		}
		echo json_encode($response);
	}

	
	public function download($id){
		$file = $this->main->get_where('files',['file_id' => $id]);
		$this->load->helper('download');
		$path = FCPATH . 'assets/files/'.$file->file_name;
		force_download($path, NULL);
	}

	public function pimpinan_index(){
		check_role(['pimpinan']);
		$data['judul'] = "Files";
		$this->tmp->view('templates/admin/template','file/pimpinan_index',$data);	
	}
        
}
        
    /* End of file  File.php */
        
                            