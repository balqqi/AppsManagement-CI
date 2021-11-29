<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_groupuser extends CI_Model {

	public function getDataGroupUsers(){
      
        $query = $this->db->query("select a.*,b.project_group_name,c.project_name,d.username
                        from user_group a
                        left join project_group b on a.project_group_id = b.project_group_id
                        left join m_project c on b.project_id = c.project_id
                        left join users d on a.user_id = d.id
                        where a.deleted = 0
                        ")->result_array();
        return $query;
	}

	public function get_list_role($id){
      
        $query = $this->db->query("select project_group_id as id,project_group_name as text 
                        from project_group
        			     where deleted = 0
                         and project_id = ".$id."")->result();


        return $query;
	}



        public function getdata_byid($id){
        $query = $this->db->query("select a.*,b.project_group_name,c.project_name,d.username,c.project_id
                        from user_group a
                        left join project_group b on a.project_group_id = b.project_group_id
                        left join m_project c on b.project_id = c.project_id
                        left join users d on a.user_id = d.id
                        where a.deleted = 0
                        and a.user_group_id = ".$id."");

        return $query->result();
        }



    public function get_list_user() {
        

        $query = $this->db->query("select a.id,a.username,b.nama
                                    from users a 
                                    left join m_employee b on a.employee_id = b.employee_id
                                    where a.deleted = 0");
        

        if ($query->num_rows() > 0) {
          return $query->result() ;
        }
        else{
          return false;
        }
      }

      public function getDataUser($project_id,$user_id) {
        

        $query = $this->db->query("SELECT a.* FROM user_group a 
                                    left join project_group b on a.project_group_id = b.project_group_id
                                    where a.user_id = ".$user_id."
                                    and b.project_id = ".$project_id."
                                    and a.deleted= 0")->num_rows();
        

      
        return $query;
      
      }


	
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */