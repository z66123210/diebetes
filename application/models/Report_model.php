<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Report_model extends CI_Model
{




	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	

	public function show($year=null, $month=null)
	{

			$userid = $this->session->userid;
			$query = 'SELECT foodlog.date , sum(foodlog.calsconsumed) as calsconsumed, fitbitcalories.calories FROM foodlog JOIN fitbitcalories ON foodlog.userid = fitbitcalories.userid AND foodlog.date = fitbitcalories.fordate
WHERE foodlog.userid ='. $userid .' and MONTH(foodlog.date) = '. $month .' and YEAR(foodlog.date) = '. $year .' GROUP BY foodlog.date'; 
			$result = $this->db->query($query)->result_array();


	return $result;
	
	}
	
	public function get_food_log($userid,$date)
	{
		$query = 'SELECT foodlog.mealid, foodlog.mealtype, foodlog.calsconsumed, fooddetail.image FROM foodlog join fooddetail on foodlog.mealid = fooddetail.dfid WHERE userid ='. $userid .' AND DATE = "' . $date .'"';
		
		$result = $this->db->query($query)->result_array();

		
	return $result;
	}




	


}
