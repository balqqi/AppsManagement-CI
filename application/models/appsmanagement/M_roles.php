<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_roles extends CI_Model {

	public function getDataRoles(){
      
        $query = $this->db->query("select * from project_group a
        				left join m_project b on a.project_id = b.project_id
        				where a.deleted = 0")->result_array();
        return $query;
	}

	public function getProjects(){
      
        $query = $this->db->query("select project_id as id,project_name as text from m_project
        			     where deleted = 0")->result_array();


        return json_encode($query);
	}



        public function getdata_byid($id){
        $query = $this->db->query("SELECT * from project_group where project_group_id = ".$id."
                                    AND deleted = 0");

        return $query->result();
        }


	
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */