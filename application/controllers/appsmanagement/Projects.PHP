<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->functions->is_login();
		$this->load->model('appsmanagement/M_project','project');
	}

	
	public function index()
	{
		

		$data['menus'] 	= $this->functions->generate_menu(); 
		$data['data_projects'] = $this->project->getDataprojects();
		$this->load->view('appsmanagement/v_projects',$data);
	}

	public function add(){
		$this->db->trans_begin();
		$data = [
				'project_name'	=> $this->input->post('project_name'),
				'controller_name'	=> $this->input->post('controller_name'),
				'project_address'	=> $this->input->post('project_address'),
				'deleted'       => 0
			
			];


		$this->db->insert('m_project',$data);
		if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Fail Created!';
				$result['title']    = 'Failed';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success Created!';
				$result['title']    = 'Added';
	        }
	        echo json_encode($result);	
	}


	public function update(){
		$id = $this->input->post('primary_key');
		$this->db->trans_begin();
		
		$project_id_session = $this->session->project_id;
		$data = [
				'project_name'	=> $this->input->post('project_name'),
				'controller_name'	=> $this->input->post('controller_name'),
				'project_address'	=> $this->input->post('project_address'),
				'deleted'       => 0
			
			];

		if ($project_id_session == $id){
				$this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Project is Using!';
				$result['title']    = 'Failed';

		}else{

		$this->db->where('project_id',$id);
		$this->db->update('m_project',$data);
		if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Fail Updated!';
				$result['title']    = 'Failed';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success Updated!';
				$result['title']    = 'Updated';
	        }
	     }
	        echo json_encode($result);	
	}


	public function delete(){
		$this->db->trans_begin();
		$id = $this->input->post('id');
		$project_id_session = $this->session->project_id;

		$data = [
				'deleted'       => 1
			];

		if ($project_id_session == $id){
				$this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Project is Using!';
				$result['title']    = 'Failed';

		}else{

		$this->db->where('project_id',$id);
		$this->db->update('m_project',$data);

			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Fail Deleted!';
				$result['title']    = 'Failed';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success Deleted!';
				$result['title']    = 'Deleted';
	        }
	    }
		echo json_encode($result);
	}


	public function getdata_byid(){

		$id = $this->input->post('id');
		$data = $this->project->getdata_byid($id);
		echo json_encode($data);
	}

	
}
