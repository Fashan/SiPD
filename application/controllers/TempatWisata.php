<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TempatWisata extends CI_Controller {

	public function index()
	{
        check_role(['admin']);
		$data["judul"] = 'Tempat Wisata';
		$this->tmp->view('templates/admin/template','tempat_wisata/index',$data);
	}

    public function pimpinan_index()
    {
        check_role(['pimpinan']);
        $data["judul"] = 'Tempat Wisata';
        $this->tmp->view('templates/admin/template','tempat_wisata/pimpinan_index',$data);
    }

	function get_ajax() {
        $list = $this->tem_wisata->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $tem_wisata) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $tem_wisata->nama_wisata;
            $row[] = $tem_wisata->lokasi;
            $row[] = $tem_wisata->kecamatan;
            $row[] = $tem_wisata->kota;           
            $row[] = '<div class="button-group">
  <a href="#" class="btn btn-danger" onClick="delete_data_wisata('.$tem_wisata->id.');"><i class="fa fa-trash"></i></a>
  <a href="#" class="btn btn-warning" onClick="get_data_wisata('.$tem_wisata->id.');" ><i class="fa fa-edit"></i></a>
</div>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->tem_wisata->count_all(),
                    "recordsFiltered" => $this->tem_wisata->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

      function delete_tem_wisata(){
        $id = $this->input->post('id',true);
        $this->main->delete('data_tempat_wisata',['id' => $id]); 
        $response = array(
                    'status' => 'success',
                );
          echo json_encode($response);
    }

    function add_tem_wisata(){
        $input = $this->input->post(null,true);
        $this->main->insert('data_tempat_wisata',$input);
        $response = array(
            'status' => 'success',
            'message' => setMsg('success','Data Tempat Wisata','berhasil di tambah'),
        );

        echo json_encode($response);
    }

    function get_tem_wisata(){
        $id = $this->input->post('id',true);
     $where = [
        'id' => $id
     ];

     $data = $this->main->get_where('data_tempat_wisata',$where);
     echo json_encode($data);
    }

    function edit_tem_wisata(){
        $id = $this->input->post('id',true);
        $data = $this->input->post(null,true);
     $where = [
        'id' => $id
     ];

        $this->main->update('data_tempat_wisata',$data,$where);
        $response = array(
            'status' => 'success',
            'message' => setMsg('success','Data Tempat Wisata','berhasil di ubah'),
        );

        echo json_encode($response);
    }

}

/* End of file TempatWisata.php */
/* Location: ./application/controllers/TempatWisata.php */
