<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

        private $path = "";
        public function __construct()
        {
            parent::__construct();
            $this->path = FCPATH . "assets/images/posts/";
             $this->load->library('pagination');
        }

	public function index()
	{
		check_role(['admin']);
		$data['judul'] = "Posts";
		$this->tmp->view('templates/admin/template', 'post/index', $data);
        
	}

    public function list()
    {
		$data['judul'] = "Posts";
        $this->tmp->view('templates/public/_header', 'post/list', $data);
    }

public function live_search(){
	$search = $this->input->get('search', true);
	$start = $this->uri->segment(3);
	$data = $this->post->get_all_post(6, $start, $search);	
	echo json_encode($data);
}

public function get_post(){
	
	$start = $this->uri->segment(3);
	$data = $this->post->get_all_post(6, $start);
	echo json_encode($data);
}

public function loadRecord($rowno=0){
 
	$rowperpage = 6;

	if($rowno != 0){
	  $rowno = ($rowno-1) * $rowperpage;
	}
	$allcount = $this->post->count_all();

	$post_record = $this->post->get_all_post($rowperpage, $rowno);

	$config['base_url'] = base_url().'post/loadRecord';
	$config['use_page_numbers'] = TRUE;
	$config['total_rows'] = $allcount;
	$config['per_page'] = $rowperpage;

	   // Membuat Style pagination untuk BootStrap v4
	   $config['first_link']       = 'First';
	   $config['last_link']        = 'Last';
	   $config['next_link']        = 'Next';
	   $config['prev_link']        = 'Prev';
	   $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	   $config['full_tag_close']   = '</ul></nav></div>';
	   $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	   $config['num_tag_close']    = '</span></li>';
	   $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	   $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	   $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	   $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	   $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	   $config['prev_tagl_close']  = '</span>Next</li>';
	   $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	   $config['first_tagl_close'] = '</span></li>';
	   $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	   $config['last_tagl_close']  = '</span></li>';

	$this->pagination->initialize($config);

	$data['pagination'] = $this->pagination->create_links();
	$data['result'] = $post_record;
	$data['row'] = $rowno;

	echo json_encode($data);
}

public function get_by_category(){
	$category = $this->input->get('category_id', true);
	$start = $this->uri->segment(3);
	$data = $this->post->get_all_post(6, $start,null,$category);
	echo json_encode($data);
}

    public function view($slug = "")
    {
        if (!$slug) {
            redirect('post/list');
        }

        $data['judul']  = "Post Detail";
        $data['post']   = $this->post->get_post_by_slug($slug);
        $data['selected_category'] = $data['post']->category_id;
        $data['recent_posts'] = $this->post->recent_post($slug);

        // Komentar
        $data['post_id'] = $data['post']->post_id;
        $data['comments'] = $this->comment->get_comment($data['post_id']);
        $data['replies'] = $this->comment->get_reply($data['post_id']);

        // Recent Comments
        $data['recent_comments'] = $this->comment->get_all_comments(5);

        $this->tmp->view('templates/public/_header','post/view',$data);
    }


 private function validation()
    {
        $this->form_validation->set_rules('post_title', 'Post Title', 'required|trim');
        $this->form_validation->set_rules('post_body', 'Post Body', 'required|trim');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
    }

 public function create()
    {
        check_role(['admin']);

        $data['judul'] = "Create New Post";
        $data['category'] = $this->main->get('category');

        $this->validation();

        if ($this->form_validation->run() == false) {
            $this->tmp->view('templates/admin/template','post/create',$data);
        } else {
            $this->save();
        }
    }




    private function _configUpload()
    {
        $config['upload_path'] = $this->path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
        $config['encrypt_name'] = False;
        $this->load->library('upload');
        $this->upload->initialize($config);
    }

    private function _compressImg($name)
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = $this->path . $name;
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = TRUE;
        $config['quality']          = '70%';
        $config['new_image']        = $this->path . $name;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

     private function save()
    {
        check_role(['admin']);

        $input = $this->input->post(null, true);
        $input['post_body'] = $this->input->post('post_body', false);
        $input['user_id'] = userdata()->user_id;
		$input['post_date']  = date('Y-m-d');
        $input['post_slug'] = $this->post->create_slug($input['post_title']);

        // Image Upload
        if (!empty($_FILES['post_thumbnail']['name'])) {
            $this->_configUpload();

            if ($this->upload->do_upload('post_thumbnail')) {
                $img = $this->upload->data();
                //Compress Image
                $this->_compressImg($img['file_name']);

                $input['post_thumbnail'] = $img['file_name'];
            } else {
                setFlashMsg('danger', "Failed to upload image : " . $this->upload->display_errors(),'');
                redirect('post/create');
            }
        }

        $this->main->insert('posts', $input);
        redirect('post/index');
    }


    public function edit($post_id)
    {
        check_role(['admin']);

        $where = ['post_id' => $post_id]; //encode_php_tags();

        $data['judul'] = 'Edit Post';
        $data['category'] = $this->main->get('category');
        $data['post'] = $this->main->get_where('posts', $where);
        if (!$data['post']) redirect('post/index');

        $this->validation();

        if ($this->form_validation->run() == false) {
            $this->tmp->view('templates/admin/template','post/edit', $data);
        } else {
            $this->update($where);
        }
    }

     private function update($where)
    {
        check_role(['admin']);

        $input = $this->input->post(null, true);
        $input['post_body'] = $this->input->post('post_body', false);

        if (!empty($_FILES['post_thumbnail']['name'])) {
            $oldimg = $this->main->get_where('posts', $where)->post_thumbnail;

            if ($oldimg) {
                if (is_file($this->path . $oldimg)) {
                    unlink($this->path . $oldimg);
                }
            }

            $this->_configUpload();

            if ($this->upload->do_upload('post_thumbnail')) {
                $img = $this->upload->data();

                //Compress Image
                $this->_compressImg($img['file_name']);

                $input['post_thumbnail'] = $img['file_name'];
            } else {
                setFlashMsg('danger',"", "Failed to upload image : " . $this->upload->display_errors());
                redirect('post/index');
            }
        }

        setFlashMsg('success', 'Post updated.','');
        $this->main->update('posts', $input, $where);
        redirect('post/index');
    }

    public function deleteContentImage($content)
    {
        check_role(['admin']);

        preg_match_all('/<img[^>]+>/i', $content, $imgTags);
        for ($i = 0; $i < count($imgTags[0]); $i++) {
            preg_match('/src="([^"]+)/i', $imgTags[0][$i], $imgage);
            $images[] = str_ireplace('src="', '',  $imgage[0]);
        }

        foreach ($images as $image) {
            $extract = explode('/', $image);
            $img = end($extract);

            $thumbnail = $this->path . $img;
            if (is_file($thumbnail)) {
                unlink($thumbnail);
            }
        }
    }

    public function delete($post_id)
    {
        check_role(['admin']);

        $id = $post_id;
        $where = ['post_id' => $id];

        $query = $this->main->get_where('posts', $where);
        if (!$query) redirect('posts');

        $this->deleteContentImage($query->post_body);

        $img = $query->post_thumbnail;
        $image = $this->path . $img;

        if ($img) {
            if (is_file($image)) {
                unlink($image);
            }
        }

        setFlashMsg('success', "Post deleted successfully.",'');
        $this->main->delete('comments', $where);
        $this->main->delete('posts', $where);
        redirect('post/index');
    }



     function get_ajax() {
        $list = $this->post->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $post) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $post->post_date;
            $row[] = $post->post_title;
            $row[] = $post->author;
            $row[] = $post->category;

            
            $row[] = '<div class="button-group">
            <a href="'.base_url("post/view/".$post->post_slug).'" class="btn btn-info"><i class="fad fa-eye"></i></a>
            <a href="'.base_url("post/edit/".$post->post_id).'" class="btn btn-warning"><i class="fa fa-edit"></i></a>
  <a href="'.base_url("post/delete/".$post->post_id).'" class="btn btn-danger"><i class="fa fa-trash"></i></a>
  
</div>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->post->count_all(),
                    "recordsFiltered" => $this->post->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */
