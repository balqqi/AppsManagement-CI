<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	public function getDataProjects(){
      
        $query = $this->db->query("select * from m_project
        				where deleted = 0")->result_array();
        return $query;
	}

	public function getProjects(){
      
        $query = $this->db->query("select project_id as id,project_name as text from m_project
        			     where deleted = 0")->result_array();


        return json_encode($query);
	}



        public function getdata_byid($id){
        $query = $this->db->query("SELECT * from m_project where project_id = ".$id."
                                    AND deleted = 0");

        return $query->result();
        }


	
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */