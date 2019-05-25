<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{
	function __construct() {

	}
	/*
     * get rows from the users table
     */


	function getRows($params = array()){

		//fetch data by conditions
		if(array_key_exists("conditions",$params)){

			$this->db->select('*');
			$this->db->from('user');
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);

			}
			$query = $this->db->get();
			$result = $query->row_array();
		}

		if(array_key_exists("userid",$params)){

			$query = $this->db->query('SELECT * 
				FROM user
				JOIN userdetails ON user.userid = userdetails.userid
				JOIN userheight ON user.userid = userheight.userid
				JOIN userweight ON userheight.userid = userweight.userid
				AND userheight.date = userweight.date
				WHERE user.userid ='. $params['userid'] .'
				AND userheight.date = ( 
				SELECT MAX(DATE) 
				FROM userheight
				WHERE userid ='. $params['userid'] .' )');
			

				
			$result = $query->row_array();

		}





		//return fetched data
		return $result;
	}

	/*
     * Insert user information
     */
	public function insert($data = array()) {
		//add created and modified data if not included
		if(!array_key_exists("created", $data)){
			$data['created'] = date("Y-m-d H:i:s");
		}
		if(!array_key_exists("modified", $data)){
			$data['modified'] = date("Y-m-d H:i:s");
		}

		//insert user data to users table
		$insert = $this->db->insert($this->userTbl, $data);

		//return the status
		if($insert){
			return $this->db->insert_id();;
		}else{
			return false;
		}
	}

}