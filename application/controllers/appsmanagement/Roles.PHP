<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->functions->is_login();
		$this->load->model('appsmanagement/M_roles','role');
	}

	
	public function index()
	{
		

		$data['menus'] 	= $this->functions->generate_menu(); 
		$data['data_roles'] = $this->role->getDataRoles();
		$data['projects'] = $this->role->getProjects();
		$this->load->view('appsmanagement/v_roles',$data);
	}

	public function add(){
		$this->db->trans_begin();
		$data = [
				'project_group_name'	=> $this->input->post('project_group_name'),
				'project_id'	=> $this->input->post('project_id'),
				'description'	=> $this->input->post('description'),
				'deleted'       => 0
			
			];


		$this->db->insert('project_group',$data);
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
		$data = [
				'project_group_name'	=> $this->input->post('project_group_name'),
				'project_id'	=> $this->input->post('project_id'),
				'description'	=> $this->input->post('description'),
				'deleted'       => 0
			
			];

		$this->db->where('project_group_id',$id);
		$this->db->update('project_group',$data);
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
	        echo json_encode($result);	
	}


	public function delete(){
		$this->db->trans_begin();
		$id = $this->input->post('id');

		$data = [
				'deleted'       => 1
			];
		$this->db->where('project_group_id',$id);
		$this->db->update('project_group',$data);

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
		echo json_encode($result);
	}


	public function getdata_byid(){
		$id = $this->input->post('id');
		$data = $this->role->getdata_byid($id);
		echo json_encode($data);
	}

	
}
