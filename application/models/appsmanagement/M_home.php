<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	public function get_project()
	{
        $user_id = $this->session->userdata('id');
        $query = $this->db->query("select c.project_id,c.project_name from user_group a
                                            left join project_group b on a.project_group_id = b.project_group_id
                                            left join m_project c on b.project_id = c.project_id
                                    where a.user_id = ".$user_id."")->result_array();


        return $query;

	}


	public function getController($id){

		$query = $this->db->query("select controller_name from m_project where project_id = ".$id."")->result_array();

		return $query;

	}

	public function getSessionProject(){
		$id = $this->session->userdata('id');
		$project_id = $this->session->userdata('project_id');
		$query = $this->db->query("select * 
									from user_group a
									left join project_group b on a.project_group_id = b.project_group_id
									where a.user_id = ".$id."
									and b.project_id = ".$project_id."")->result_array();
		return $query;

	}
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */