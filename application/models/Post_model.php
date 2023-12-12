<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{

      // start datatables
    var $column_order = array(null,'post_date','post_title','author','category'); //set column field database for datatable orderable
    var $column_search = array('post_date','post_title','author','category'); //set column field database for datatable searchable
    var $order = array('post_id' => 'desc'); // default order 
 
    private function _get_datatables_query() {
		$user_desa_id = userdata()->desa_id;
       $this->db->select('posts.*, category.category_name as category, users.username as author');
        $this->db->from('posts');
        $this->db->join('category', 'posts.category_id = category.category_id');
        $this->db->join('users', 'posts.user_id = users.user_id AND posts.desa_id = '.$user_desa_id);
        $i = 0;
        foreach ($this->column_search as $data) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($data, $_POST['search']['value']);
                } else {
                    $this->db->or_like($data, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('posts');
        return $this->db->count_all_results();
    }
    // end datatables

    public function get_table_post()
    {
        $this->db->join('category', 'category_id');
        $this->db->join('users', 'user_id');
        $this->db->order_by('post_id', 'desc');
        return $this->db->get('posts')->result();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 6);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower($combine);
        $preslug = url_title($lowercase);

        $slug = $preslug;

        $this->db->like('post_slug', $preslug, 'after');
        $checkslug = $this->db->get('posts');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }

    public function count_data($search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('p.category_id', $category);
        }

        if ($search != null) {
            $this->db->like('p.post_title', $search);
        }

        $this->db->join('category c', 'c.category_id=p.category_id');
        $this->db->from('posts p');
        return $this->db->get()->num_rows();
    }

    public function get_all_post($limit, $start, $search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('p.category_id', $category);
        }

        if ($search != null) {
            $this->db->like('p.post_title', $search);
        }

        $this->db->select('p.*, c.category_name, u.username, u.avatar');
        $this->db->order_by('post_id', 'desc');
        $this->db->join('category c', 'c.category_id=p.category_id');
        $this->db->join('users u', 'u.user_id=p.user_id', 'left');
        $query = $this->db->get('posts p', $limit, $start)->result();
        return $query;
    }

    public function get_post_by_slug($slug = null)
    {
        $this->db->select('p.*, c.category_name, u.username, u.avatar');
        $this->db->join('category c', 'c.category_id=p.category_id');
        $this->db->join('users u', 'u.user_id=p.user_id', 'left');
        $query = $this->db->get_where('posts p', ['p.post_slug' => $slug]);
        return $query->row();
    }

    public function recent_post($slug)
    {
        $this->db->join('category c', 'c.category_id=p.category_id');
        $this->db->where('post_slug !=', $slug);
        $this->db->order_by('post_date', 'desc');
        $this->db->limit(5);
        return $this->db->get('posts p')->result();
    }
}
