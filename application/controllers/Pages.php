<?php
class Pages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('pages_model');
	}

	public function index()
	{
		$data['pages'] = $this->pages_model->get_pages();
		$data['title'] = 'Customize your page';
// 		$this->load->view('templates/header', $data);
// 		$this->load->view('pages/index', $data);
// 		$this->load->view('templates/footer');
		$this->load->view('pages/page_view',$data);
	}
// 	public function view($id)
// 	{
// 		$data['pages_item'] = $this->pages_model->get_pages($id);
// 		if (empty($data['pages_item']))
// 		{
// 			show_404();

// 		}
// 		$data['Title'] = $data['pages_item']['Title'];
// 		$this->load->view('templates/header', $data);
// 		$this->load->view('pages/view', $data);
// 		$this->load->view('templates/footer');
// 	}

// 	public function create()
// 	{
// 		$this->load->helper('form');
// 		$this->load->library('form_validation');
// 		$data['title'] = 'Create a page';

// 		$this->form_validation->set_rules('title', 'Title', 'required');
// 		if ($this->form_validation->run() === FALSE)
// 		{

// 			$this->load->view('templates/header', $data);
// 			$this->load->view('pages/create');
// 			$this->load->view('templates/footer');
// 		}
// 		else
// 		{
// 			$this->pages_model->set_pages();
// 			$this->load->view('pages/success');
// 		}
// 	}

	public function page_add()
	{
		$data = array(
			'UserId' => $this->input->post('UserId'),
			'Page_order' => $this->input->post('Page_order'),
			'Title' => $this->input->post('Title'),
			'Body' => $this->input->post('Body'),
			'Image' => $this->input->post('Image'),
		);

		$insert = $this->pages_model->page_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->pages_model->get_by_id($id);
		echo json_encode($data);
	}

	public function page_update()
	{
		$data = array(
			'UserId' => $this->input->post('UserId'),
			'Page_order' => $this->input->post('Page_order'),
			'Title' => $this->input->post('Title'),
			'Body' => $this->input->post('Body'),
			'Image' => $this->input->post('Image'),
		);
		
		
		$this->pages_model->page_update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function page_delete($id)
	{
		$this->pages_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


}


