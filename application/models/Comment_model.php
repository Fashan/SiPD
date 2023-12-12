<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{

	  // start datatables
	  var $column_order = array(null,'comment_date','comment_body'); //set column field database for datatable orderable
	  var $column_search = array('comment_date','comment_body'); //set column field database for datatable searchable
	  var $order = array('comment_id' => 'asc'); // default order 
	
	  private function _get_datatables_query() {
		$this->db->select('c.*, u.username, u.avatar, u.role, p.post_slug');
		  $this->db->from('comments c');
		  $this->db->join('posts p', 'post_id', 'left');
		  $this->db->join('users u', 'u.user_id=c.user_id', 'left');
		  $i = 0;
		  foreach ($this->column_search as $comment) { // loop column 
			  if(@$_POST['search']['value']) { // if datatable send POST for search
				  if($i===0) { // first loop
					  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					  $this->db->like($comment, $_POST['search']['value']);
				  } else {
					  $this->db->or_like($comment, $_POST['search']['value']);
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
		  $this->db->from('comments');
		  return $this->db->count_all_results();
	  }
	  // end datatables 


    public function get_comment($post_id)
    {
        $this->db->select('c.*, u.username, u.avatar, u.role');
        $this->db->where('post_id', $post_id);
        $this->db->where('comment_parent', 0);
        $this->db->order_by('comment_date', 'desc');
        $this->db->join('users u', 'u.user_id=c.user_id', 'left');
        $query = $this->db->get('comments c');
        return $query->result();
    }

    public function get_reply($post_id)
    {
        $comments = $this->get_comment($post_id);

        $replies = [];
        foreach ($comments as $c) {
            $this->db->select('c.*, u.username, u.avatar, u.role');
            $this->db->where('comment_parent', $c->comment_id);
            $this->db->order_by('comment_date', 'desc');
            $this->db->join('users u', 'u.user_id=c.user_id', 'left');
            $query = $this->db->get('comments c');
            $replies[$c->comment_id] = $query->result();
        }

        return $replies;
    }

    public function get_all_comments($limit = null)
    {
        $this->db->select('c.*, u.username, u.avatar, u.role, p.post_slug');
        $this->db->order_by('comment_date', 'desc');
        $this->db->join('posts p', 'post_id', 'left');
        $this->db->join('users u', 'u.user_id=c.user_id', 'left');

        if ($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get('comments c');
        return $query->result();
    }

    public function number_of_comments($post_id)
    {
        return $this->db->get_where('comments', ['post_id' => $post_id])->num_rows();
    }
}
