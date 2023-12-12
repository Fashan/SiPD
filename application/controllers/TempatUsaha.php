<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TempatUsaha extends CI_Controller {

	public function index()
	{
        check_role(['admin']);
		$data["judul"] = 'Tempat Usaha';
		$this->tmp->view('templates/admin/template','tempat_usaha/index',$data);
	}

    public function pimpinan_index()
    {
        check_role(['pimpinan']);
        $data["judul"] = 'Tempat Usaha';
        $this->tmp->view('templates/admin/template','tempat_usaha/pimpinan_index',$data);
    }

	function get_ajax() {
        $list = $this->tem_usaha->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $usaha) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $usaha->nama;
            $row[] = $usaha->jenis_kelamin;
            $row[] = $usaha->tempat;
            $row[] = $usaha->tanggal_lahir;
            $row[] = $usaha->pekerjaan;
            $row[] = $usaha->agama;
            $row[] = $usaha->usaha;
            $row[] = $usaha->alamat;
            
            $row[] = '<div class="button-group">
  <a href="#" class="btn btn-danger" onClick="delete_data_usaha('.$usaha->id.');"><i class="fa fa-trash"></i></a>
  <a href="#" class="btn btn-warning" onClick="get_data_usaha('.$usaha->id.');" ><i class="fa fa-edit"></i></a>
</div>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->tem_usaha->count_all(),
                    "recordsFiltered" => $this->tem_usaha->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

      function delete_tem_usaha(){
        $id = $this->input->post('id',true);
        $this->main->delete('data_tempat_usaha',['id' => $id]); 
        $response = array(
                    'status' => 'success',
                );
          echo json_encode($response);
    }

    function add_tem_usaha(){
        $input = $this->input->post(null,true);
        $this->main->insert('data_tempat_usaha',$input);
        $response = array(
            'status' => 'success',
            'message' => setMsg('success','Data Tempat Usaha','berhasil di tambah'),
        );

        echo json_encode($response);
    }

    function get_tem_usaha(){
        $id = $this->input->post('id',true);
     $where = [
        'id' => $id
     ];

     $data = $this->main->get_where('data_tempat_usaha',$where);
     echo json_encode($data);
    }

    function edit_tem_usaha(){
        $id = $this->input->post('id',true);
        $data = $this->input->post(null,true);
     $where = [
        'id' => $id
     ];

        $this->main->update('data_tempat_usaha',$data,$where);
        $response = array(
            'status' => 'success',
            'message' => setMsg('success','Data Tempat Usaha','berhasil di ubah'),
        );

        echo json_encode($response);
    }
}

/* End of file TempatUsaha.php */
/* Location: ./application/controllers/TempatUsaha.php */
