<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->functions->is_login();
		$this->load->model('M_home');
	}

	
	public function index()
	{
		$data['project'] = $this->M_home->get_project();
		$this->load->view('v_home',$data);
	}

	public function goto_project(){
		$project_id = $this->input->post('project_id');

		$getController = $this->M_home->getController($project_id);

		$sess_data = [
						'project_id' => $project_id
					];

		$this->session->set_userdata($sess_data);


		echo json_encode($getController[0]['controller_name']);

		






	}
}
