<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('plan_model');
		$this->load->model('users_model');
		$this->load->model('meal_model');
	}

	/*
     * User account information
     */
	public function index()
	{

		$userid = $this->session->userid;

		if($userid){
			$data['user'] = $this->users_model->getRows(array('userid'=>$userid));
			$from = new DateTime($data['user']['dob']);
			$to = new DateTime('today');
			$data['user']['age'] = $from->diff($to)->y;
			$this->health_info($data);


		}else{
			$this->login();
		}

	}
	
	
	function update_plan() {
		$userid = $this->session->userid;
		
			$weight = $this->session->weight;
			$pweight =$this->input->post('pweight');
			$ptime = $this->input->post('ptime');
			$bmr = $this->session->calories;
			$meal_level = $this->input->post('meal_level');

			$change_weight = $pweight - $weight;

			$change_weight_per_day = $change_weight/($ptime*7);
			$change_calories_per_day = $change_weight_per_day * 1000;
			$change_calories_per_day_by_meal = $meal_level-$bmr;
			$change_calories_per_day_by_activity = $change_calories_per_day + $change_calories_per_day_by_meal;
			
			echo $pweight . '<br>' . $ptime . '<br>' . $meal_level;
			
			
			$data = array(
				

				
				'pweight' => $pweight,
				'ptime' => $ptime,
				
				'meal_level' => $meal_level,
				
				'calories_change_by_activities' =>  $change_calories_per_day_by_activity,
				
			);
			
			$this->plan_model->update_plan1($userid,$data);
			$this->index();
}
	
	

	public function health_info($data)
	{
		$height = $data['user']['height']/100;
		$weight = $data['user']['weight'];
		$age =  $data['user']['age'];
		$sex =  $data['user']['gender'];

		$bmi = $weight / ($height * $height);
		$bmr_f = 10 * $weight + 6.25 * $height*100 - 5 * $age - 161;
		$bmr_m = 10 * $weight + 6.25 * $height*100 - 5 * $age +5;

		// Weight suggestion
		if ($bmi < 18.5) {
			$classification = 'Underweight';
		}
		else if ($bmi < 24.99){
			$classification = 'Normal range';
		}
		else if ($bmi < 29.99){
			$classification = 'Preobese';
		}
		else if ($bmi < 34.99){
			$classification = 'Obese class 1';
		}else if ($bmi < 39.99){
			$classification = 'Obese class 2';
		}else{
			$classification = 'Obese class 3';
		};

		
		$good_weight = 25*($height * $height);

		if ($sex == 'm')
		{
			$data['user'] = array(
				'name' => $data['user']['fname'] . ' ' .$data['user']['lname'],
				'age' => $age,
				'sex' => $sex,
				'height' => $height,
				'weight' => $weight,
				'bmi' => $bmi,
				'classification'=>$classification,
				'good_weight'=>$good_weight,
				'calories' => $bmr_m,
			);
		}
		else if ($sex =='f')
		{
			$data['user'] = array(
				'name' => $data['user']['fname'] . ' ' .$data['user']['lname'],
				'age' => $age,
				'sex' => $sex,
				'height' => $height,
				'weight' => $weight,
				'bmi' => $bmi,
				'classification'=>$classification,
				'good_weight'=>$good_weight,
				'calories' => $bmr_f,
			);
		};




		$data['meal_levels'] = $this->meal_model->get_meal_list();

		$plan = $this->plan_model->get_plan($this->session->userid);

	
		if ($plan)
		{
			$data['plan'] = $plan;

			$data['meal_ingredients'] = $this->meal_model->get_meal_detail($plan->meal_level);
			$data['plan']->checkplan = true;
		}
		else 
		{
			$data['plan'] = (object) 'no plan';
			$data['plan']->checkplan = false;
		}
		$this->session->set_userdata($data);

				$this->load->view('templates/header');
		$this->load->view('users/account');
				$this->load->view('templates/footer');
	}
	/*
     * User login
     */
	public function login(){
		$data = array();

		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		if($this->input->post('loginSubmit')){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required');
			if ($this->form_validation->run() == true) {
				$con['returnType'] = 'single';
				$con['conditions'] = array(
					'email'=>$this->input->post('email'),
					'password' => $this->input->post('password')
					//                     'password' => md5($this->input->post('password')),
					//                     'status' => '1'
				);

				$checkLogin = $this->users_model->getRows($con);

				if($checkLogin){
					$this->session->set_userdata('isUserLoggedIn',TRUE);
					$this->session->set_userdata('userid',$checkLogin['userid']);

					redirect('users');

				}else{
					$data['error_msg'] = 'Wrong email or password, please try again.';
				}

			}
		}

		//load the view
		$this->load->view('users/login', $data);
	}

	/*
     * User registration
     */
	public function registration(){
		$data = array();
		$userData = array();
		if($this->input->post('regisSubmit')){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

			$userData = array(
				'name' => strip_tags($this->input->post('name')),
				'email' => strip_tags($this->input->post('email')),
				'password' => md5($this->input->post('password')),
				'gender' => $this->input->post('gender'),
				'phone' => strip_tags($this->input->post('phone'))
			);

			if($this->form_validation->run() == true){
				$insert = $this->users_model->insert($userData);
				if($insert){
					$this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
					redirect('users/login');
				}else{
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			}
		}
		$data['user'] = $userData;
		//load the view
		$this->load->view('users/registration', $data);
	}

	/*
     * User logout
     */
	public function logout(){
		$this->session->unset_userdata('isUserLoggedIn');
		$this->session->unset_userdata('userId');
		$this->session->sess_destroy();
		redirect('users/login/');
	}

	/*
     * Existing email check during validation
     */
	public function email_check($str){
		$con['returnType'] = 'count';
		$con['conditions'] = array('email'=>$str);
		$checkEmail = $this->users_model->getRows($con);
		if($checkEmail > 0){
			$this->form_validation->set_message('email_check', 'The given email already exists.');
			return FALSE;
		} else {
			return TRUE;
		}
	}



}