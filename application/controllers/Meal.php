<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal extends CI_Controller {

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


	
		$this->load->model('meal_model');

	}
	
	
	public function index()
	{
		$meal_list['lists'] = $this->meal_model->get_meal_list();
		var_dump($meal_list);
		$this->load->view('welcome_message',$meal_list);
	}



	public function meal_info()
	{
		$meal['level'] = $this->uri->segment(3);

		$meal_list = $this->meal_model->get_meal_list();


		if($meal['level'])
		{
			if (in_array($meal['level'] , $meal_list ))

			{
				$meal['valid'] = 'found';
				$meal['details'] = $this->meal_model->get_meal_detail($meal['level']);
			}
			else
			{
				$meal['valid'] = 'no plan';
			}

		}
		else{
			$meal['valid'] = 'no choose';
		}
		$this->load->view('meal/meal_detail',$meal);

	}
}