<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Saran extends CI_Controller {

public function index()
{
	check_role(['admin']);
	$data['saran'] = $this->saran->get_all_saran();
	$data['judul'] = 'Saran';
	$this->tmp->view('templates/admin/template','saran/index',$data);
                
}

public function forum(){
	$data['judul'] = 'Saran';
	$this->tmp->view('templates/public/_header','saran/forum',$data);
}


public function add(){
	check_role(['member','admin']);
	$config = [
		'saran' => [
			 'field'    => 'isi_saran',
			  'label'   => 'Kotak Saran',
			  'rules'   => 'required|trim',
			  'errors'    => [
				 'required' => 'Mohon mengisi {field}',
			  ]
		   ],
	   ];
	   $this->form_validation->set_rules($config);
	   if ($this->form_validation->run() == false) {
		setFlashMsg('danger','',strip_tags(form_error('isi_saran')));
		$client = $_SERVER['HTTP_REFERER'].'#forum_saran';
	redirect($client);
   } else {
	$input = $this->input->post(null,true);
	$input['tanggal_saran']  = date('Y-m-d');
	$input['user_id'] = userdata()->user_id;
	$this->main->insert('saran',$input);
	setFlashMsg('success','Saran','berhasil disimpan');
	$client = $_SERVER['HTTP_REFERER'].'#forum_saran';
	redirect($client, 'refresh');
   }
}



public function download($id){
	$saran = $this->main->get_where('saran',['saran_id' => $id]);
	$this->load->helper('download');
	$data = $saran->isi_saran;
	force_download('saran.doc', $data);
}

public function delete($id){
	$this->main->delete('saran',['saran_id'=>$id]);
	setFlashMsg('success','Saran','telah di hapus');
	redirect('saran');
}

        
}
        
    /* End of file  Saran.php */
        
                            