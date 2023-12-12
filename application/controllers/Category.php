<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_role(['admin']);
    }

    public function index()
    {
        $data['judul'] = "Category";
        $data['category'] = $this->main->get('category', 'category_id');

        $this->validation();
        if ($this->form_validation->run() == false) {
            $this->tmp->view('templates/admin/template', 'category/index',$data);
        } else {
            $input = $this->input->post(null, true);

            if ($input['category_id'] == "") {
                $this->main->insert('category', $input);
                setFlashMsg('success', 'Category added.','');
            } else {
                $where = ['category_id' => $input['category_id']];
                unset($input['category_id']);

                $this->main->update('category', $input, $where);
                setFlashMsg('success', 'Category updated.','');
            }

            redirect('category');
        }
    }

    private function validation()
    {
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
        $this->form_validation->set_rules('category_desc', 'Category Description', 'trim');
    }

    public function delete($id)
    {
        $where = ['category_id' => $id];
        $this->main->delete('category', $where);

        setFlashMsg('success', 'Category deleted.','');
        redirect('category');
    }

	
function get_ajax() {
	$list = $this->category->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $category) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $category->category_name;
		$row[] = $category->category_desc;
		$row[] = '<div class="button-group">
		<button type="button" data-id="'.$category->category_id.'" data-name="'.$category->category_name.'" data-desc="'.$category->category_desc.'" class="btn btn-default btn-sm btn-warning btn-edit"><i class="fa fa-edit"></i> Edit</button>
<a href="'.base_url('category/delete/'.$category->category_id).'" onclick="return confirm("Yakin ingin hapus ?");" class="btn btn-default btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->category->count_all(),
				"recordsFiltered" => $this->category->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}

}
