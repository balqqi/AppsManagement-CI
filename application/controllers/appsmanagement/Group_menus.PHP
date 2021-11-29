<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_menus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->functions->is_login();
		$this->load->model('appsmanagement/M_groupmenu','groupmenu');
		$this->load->model('appsmanagement/M_roles','role');
	}

	
	public function index()
	{
		

		$data['menus'] 	= $this->functions->generate_menu(); 
		$data['data_groupmenus'] = $this->groupmenu->getDatagroupMenus();
		$data['projects'] = $this->role->getProjects();
		$data['data_menus'] = $this->groupmenu->getMenus();
		$this->load->view('appsmanagement/v_groupmenus',$data);
	}

	public function add(){
		$this->db->trans_begin();
		$project_group_id = $this->input->post('project_group_id');
		$menu_id = $this->input->post('menu_id');
		$checkdata = $this->groupmenu->getDataMenu($project_group_id,$menu_id);

		
		$data = [
				'project_group_id'	=> $this->input->post('project_group_id'),
				'menu_id'	=> $this->input->post('menu_id'),
				'deleted'       => 0,
				
			
			];

		if ($checkdata > 0){
				$this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Menu Already Exist!';
				$result['title']    = 'Failed';

		}else{
				$this->db->insert('menu_group',$data);
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
		}


		
	        echo json_encode($result);	
	}


	public function update(){
		$id = $this->input->post('primary_key');
		$this->db->trans_begin();
		$project_group_id = $this->input->post('project_group_id');
		$menu_id = $this->input->post('menu_id');
		$checkdata = $this->groupmenu->getDataMenu($project_group_id,$menu_id);
		$data = [
				'project_group_id'	=> $this->input->post('project_group_id'),
				'menu_id'	=> $this->input->post('menu_id'),
				'deleted'       => 0,
				
			
			];

		if ($checkdata > 0){
				$this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Menu Already Exist!';
				$result['title']    = 'Failed';

		}else{

		$this->db->where('menu_group_id',$id);
		$this->db->update('menu_group',$data);
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

		$data = [
				'deleted'       => 1
			];
		$this->db->where('menu_group_id',$id);
		$this->db->update('menu_group',$data);

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
		$data = $this->groupmenu->getdata_byid($id);
		echo json_encode($data);
	}

	public function list_user(){
		$data = $this->groupmenu->get_list_user();
		$output=array('data'=>$data);
		echo json_encode($output);
	}

	public function list_role(){
		$id = $this->input->post('id');
		$data = $this->groupmenu->get_list_role($id);
		$output=array('data'=>$data);
		echo json_encode($output);
	}

	
}
