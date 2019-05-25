<?php
class Pages_model extends CI_Model {
	var $table = 'page';
	public function __construct()
	{
		$this->load->database();
	}

	public function get_pages($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('page');
			
			return $query->result_array();
			
		}
		$query = $this->db->get_where('page', array('id' => $id));
		
		return $query->row_array();
	}

	public function set_pages()
	{
		$this->load->helper('url');
		$data = array(
			'Title' => $this->input->post('title'),
			'UserId' => $this->input->post('userid'),
			'Body' => $this->input->post('body'),
			'Image' => $this->input->post('image'),

		);
		
		return $this->db->insert('page', $data);
	}

	public function get_all_pages()
	{
		$this->db->from('page');
		$query=$this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function page_add($data)
	{
		
		$this->db->insert($this->table, $data);
		
		return $this->db->insert_id();
	}

	public function page_update($where, $data)
	{
		
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}