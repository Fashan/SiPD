<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	public function index()
	{
        check_role(['admin']);
		$data['judul'] ='Penduduk';
		$this->tmp->view('templates/admin/template','penduduk/index',$data);
	}

    public function pimpinan_index()
    {
        check_role(['pimpinan']);
        $data['judul'] ='Penduduk';
        $this->tmp->view('templates/admin/template','penduduk/pimpinan_index',$data);
    }

	function get_ajax() {
        $list = $this->penduduk->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $penduduk) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $penduduk->nomor_kk;
            $row[] = $penduduk->nik;
            $row[] = $penduduk->nama;
            $row[] = $penduduk->tempat;
            $row[] = $penduduk->tanggal_lahir;
            $row[] = $penduduk->alamat;
            $row[] = $penduduk->kewarganegaraan;
            $row[] = $penduduk->status_perkawinan;
            $row[] = $penduduk->agama;
            $row[] = $penduduk->golongan_darah;
            $row[] = $penduduk->pendidikan_terakhir;
            $row[] = $penduduk->pekerjaan;
            $row[] = $penduduk->kebutuhan_khusus;
            $row[] = $penduduk->nama_ayah;
            $row[] = $penduduk->nama_ibu;
            $row[] = $penduduk->jenis_kelamin;
            $row[] = '<div class="button-group">
  <a href="#" class="btn btn-danger" onClick="delete_penduduk('.$penduduk->id.');"><i class="fa fa-trash"></i></a>
  <a href="#" class="btn btn-warning" onClick="get_penduduk('.$penduduk->id.');" ><i class="fa fa-edit"></i></a>
</div>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->penduduk->count_all(),
                    "recordsFiltered" => $this->penduduk->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

      function delete_penduduk(){
        $id = $this->input->post('id',true);
        $this->main->delete('data_penduduk',['id' => $id]); 
        $response = array(
                    'status' => 'success',
                );
          echo json_encode($response);
    }

    function add_penduduk(){
        $input = $this->input->post(null,true);
        $this->main->insert('data_penduduk',$input);
        $response = array(
            'status' => 'success',
            'message' => setMsg('success','Data Penduduk','berhasil di tambah'),
        );

        echo json_encode($response);
    }

    function get_penduduk(){
        $id = $this->input->post('id',true);
     $where = [
        'id' => $id
     ];

     $data = $this->main->get_where('data_penduduk',$where);
     echo json_encode($data);
    }

    function edit_penduduk(){
        $id = $this->input->post('id',true);
        $data = $this->input->post(null,true);
     $where = [
        'id' => $id
     ];

        $this->main->update('data_penduduk',$data,$where);
        $response = array(
            'status' => 'success',
            'message' => setMsg('success','Data Penduduk','berhasil di ubah'),
        );

        echo json_encode($response);
    }

}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */