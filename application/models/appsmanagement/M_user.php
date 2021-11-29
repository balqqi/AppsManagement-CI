<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getDataUsers(){
      
        $query = $this->db->query("select * from users a
        				left join m_employee b on a.employee_id = b.employee_id
                        where a.deleted = 0")->result_array();
        return $query;
	}

	public function getProjects(){
      
        $query = $this->db->query("select project_id as id,project_name as text from m_project
        			     where deleted = 0")->result_array();


        return json_encode($query);
	}



        public function getdata_byid($id){
        $query = $this->db->query("select * from users a
                                        left join m_employee b on a.employee_id = b.employee_id
                                        where a.deleted = 0
                                        and a.id = ".$id."");

        return $query->result();
        }



    public function get_list_employee() {
        

        $query = $this->db->query("select a.employee_id,a.nama,a.identitas,b.nm_jabatan
                                    from m_employee a 
                                    left join jabatan b on a.id_jabatan = b.id_jabatan");
        

        if ($query->num_rows() > 0) {
          return $query->result() ;
        }
        else{
          return false;
        }
      }


	
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */