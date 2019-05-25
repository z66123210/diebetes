<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->helper('url');

		$this->load->model('report_model');
		$this->load->model('meal_model');

	}


	public function index()
	{



		if ($this->session->userid)
		{
			$data['year'] = date('Y');
			$data['month'] = date('m');
			$this->show($data['year'],$data['month']);


		}
		else
		{
			redirect('users');
		}



	}

	public function show($year=null,$month=null)
	{



		$cal_totals = $this->report_model->show($year,$month);
		$event = [];
		if ($cal_totals)
		{
			foreach ($cal_totals as $cal_total)
			{
				$userid = $this->session->userid;
				$dateArray = date_parse_from_format('Y-m-d', $cal_total['date']);
				$day = $dateArray['day'];
				$calories_change = $cal_total['calsconsumed'] - $cal_total['calories'];


				$note = 'Calories intake: '. anchor_popup('report/user_food_detail/'. $cal_total['date'].'/'.$userid, $cal_total['calsconsumed']) .' cals <br /> Calories consumed: ' . $cal_total['calories'] . ' cals <br /> Carlories : '. $calories_change . ' cals <br />' ;
				$event[$day] = $note;
			}
		}

		$this->load->library('calendar');

		$vars['calendar']= $this->calendar->generate($year,$month,$event);


		$this->load->view('templates/header');
		$this->load->view('calendar',$vars);
		$this->load->view('templates/footer');


	}

	public function user_food_detail()
	{
		$date = $this->uri->segment(3,0);
		$userid = $this->uri->segment(4,0);
		$data['date'] = $date;
		$data['details'] = $this->report_model->get_food_log($userid,$date);

		$this->load->view('meal/user_food_detail',$data);
	}




	/* End of file calendar.php */
	/* Location: ./application/controllers/calendar.php */






}
