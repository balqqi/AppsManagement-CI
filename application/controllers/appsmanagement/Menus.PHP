<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->functions->is_login();
		$this->load->model('appsmanagement/M_menu','menus');
		$this->load->model('appsmanagement/M_roles','role');
	}

	
	public function index()
	{
		

		$data['menus'] 	= $this->functions->generate_menu(); 
		$data['data_menus'] = $this->menus->getDataMenus();
		$data['projects'] = $this->role->getProjects();
		$data['parents'] = $this->menus->getParents();
		$this->load->view('appsmanagement/v_menus',$data);
	}

	public function add(){
		$this->db->trans_begin();
		$data = [
				'project_id'	=> $this->input->post('project_id'),
				'level'	=> $this->input->post('level'),
				'parent_id'	=> $this->input->post('parent_id'),
				'menu_name'	=> $this->input->post('menu_name'),
				'controller_name'	=> $this->input->post('controller_name'),
				'menu_order'	=> $this->input->post('menu_order'),
				'icon'	=> $this->input->post('icon'),
				'deleted'       => 0,
				
			
			];


		$this->db->insert('menu',$data);
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
				'project_id'	=> $this->input->post('project_id'),
				'level'	=> $this->input->post('level'),
				'parent_id'	=> $this->input->post('parent_id'),
				'menu_name'	=> $this->input->post('menu_name'),
				'controller_name'	=> $this->input->post('controller_name'),
				'menu_order'	=> $this->input->post('menu_order'),
				'icon'	=> $this->input->post('icon'),
				'deleted'       => 0,
				
			
			];

		$this->db->where('menu_id',$id);
		$this->db->update('menu',$data);
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
		$this->db->where('menu_id',$id);
		$this->db->update('menu',$data);

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
		$data = $this->menus->getdata_byid($id);
		echo json_encode($data);
	}

	public function list_employee(){
		$data = $this->users->get_list_employee();
		$output=array('data'=>$data);
		echo json_encode($output);
	}

	
}
