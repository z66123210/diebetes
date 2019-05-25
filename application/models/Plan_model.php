<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Plan_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_plan($userid)
	{
// 		
			$this->db->select('*');
			$this->db->from('plan');
			$this->db->where('userid',$userid);
			$this->db->order_by('time_updated', 'DESC');
			$query = $this->db->get();
			$result = $query->row();
		
			
		return $result;
	}

	public function update_plan($userid, $data)
	{
		$plan = $this->db->get_where('plan', array('userid' => $userid))->row();
			$this->db->insert('plan', $data);
			
	}
	
	function update_plan1($id,$data){
$this->db->where('userid ', $id);
$this->db->update('plan', $data);
}
}

?>
