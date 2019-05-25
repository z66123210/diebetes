<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Meal_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function get_meal_list()
{
	
	$lists = $this->db->query('SELECT DISTINCT mllevel FROM  meallevel')->result();
	foreach ($lists as $list)
		
	{
		 $meal_list[] = $list->mllevel;
	}
	return $meal_list;
}
	public function get_meal_detail($meallevel)
	{
		$details = array();
		
			$query = 'SELECT meallevel.quantity, fooddetail . * 
FROM meallevel
JOIN fooddetail ON meallevel.foodid = fooddetail.dfid
WHERE meallevel.mllevel ='. $meallevel;
			$lists = $this->db->query($query)->result();
			foreach ($lists as $list)
		
	{
		 $details[] = $list;
	}
			
		

		return $details;
	}
}
