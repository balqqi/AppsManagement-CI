<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->functions->is_login();
		$this->load->model('appsmanagement/M_home','appsmanagement');
	}

	
	public function index()
	{
		$getSessionProject = $this->appsmanagement->getSessionProject();

		$sess_data = [
						'project_group_id' => $getSessionProject[0]['project_group_id'],
						'project_group_name' => $getSessionProject[0]['project_group_name']
					];
					
		$this->session->set_userdata($sess_data);

		$data['menus'] 	= $this->functions->generate_menu(); 
		$this->load->view('appsmanagement/v_home',$data);
	}

	
}
