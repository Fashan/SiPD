<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        check_role(['admin']);

        $data['judul'] = "Comments";
        $this->tmp->view('templates/admin/template','comment/index',$data);
    }

    public function add()
    {
        if (!userdata()) {
            redirect('auth');
        } else {
            $input = $this->input->post(null, true);
            $input['comment_date']  = date('Y-m-d');
            $input['user_id']       = userdata()->user_id;

            $this->form_validation->set_rules('comment_body', 'Comment', 'required|trim');
            if ($this->form_validation->run() == true) {
                $this->main->insert('comments', $input);
            }
			
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    public function delete($comment_id)
    {
        if (!userdata()) {
            redirect('signin');
        } else {
            $where = [
                'comment_id' => $comment_id
            ];

            $comment = $this->main->get_where('comments', $where);
            $parent = $comment->comment_parent;

            if (userdata()->role == "member") {
                if (userdata()->user_id != $comment->user_id) {
                    redirect($_SERVER['HTTP_REFERER'], 'refresh');
                }
            }
//hapus comment child
            if ($parent == "0") {
                $this->main->delete('comments', ['comment_parent' => $comment->comment_id]);
            }

            $this->main->delete('comments', $where);
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

		
function get_ajax() {
	$list = $this->comment->get_datatables();
	$data = array();
	$no = @$_POST['start'];
	foreach ($list as $comment) {
		$view = base_url("post/view/") . $comment->post_slug .'#c'.$comment->comment_id;
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $comment->comment_date;
		$row[] = $comment->comment_body;
		$row[] = '<div class="button-group">
		<a href="'.$view.'" class="btn btn-default btn-sm btn-info" ><i class="fa fa-eye"></i> View</a>
<a href="'.base_url('comment/delete/'.$comment->comment_id).'" onclick="return confirm("Yakin ingin hapus ?");" class="btn btn-default btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
</div>';
		$data[] = $row;
	}
	$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->comment->count_all(),
				"recordsFiltered" => $this->comment->count_filtered(),
				"data" => $data,
			);
	// output to json format
	echo json_encode($output);
}
}
