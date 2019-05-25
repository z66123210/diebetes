<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();


		$this->load->model('plan_model');
		$this->load->model('users_model');
		$this->load->model('meal_model');

	}

	public function index()
	{

	redirect('users');
	}





	public function create_plan()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('pweight', 'Weight', 'required');
		$this->form_validation->set_rules('ptime', 'Time', 'required');

		if ($this->form_validation->run() === FALSE)
		{


			$this->load->view('plan/result');

		}
		else
		{

			
			$age = $this->session->age;
			$sex = $this->session->sex;
			$height = $this->session->height;
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


			$data = array(
				'age' => $age,
				'sex' => $sex,
				'height' => $height,
				'weight' => $weight,
				'pweight' => $pweight,
				'ptime' => $ptime,
				'bmr' => $bmr,
				'meal_level' => $meal_level,
				'change_weight' => $change_weight,
				'change_weight_per_day' => $change_weight_per_day,
				'change_calories_per_day' => $change_calories_per_day,
				'change_calories_per_day_by_meal' => ($change_calories_per_day_by_meal* (-1)),
				'change_calories_per_day_by_activity' => $change_calories_per_day_by_activity,
			);

			$this->session->set_userdata($data);
			$this->load->view('plan/plan',$data);
		};
	}


	public function update_plan()
	{
		$userid = $this->session->userid;
$data = array(
	'userid'=>$userid,
  'pweight'=> $this->session->pweight,
	'ptime'=> $this->session->ptime,
	'calories_change_by_activities' =>$this->session->change_calories_per_day_by_activity,
	'meal_level' =>$this->session->meal_level,
	'time_updated' => date("Y-m-d",time())
);
		$this->plan_model->update_plan($userid, $data);
		echo 'updated!';
		redirect('users');
	}




}
