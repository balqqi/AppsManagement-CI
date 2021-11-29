<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_groupmenu extends CI_Model {

	public function getDataGroupMenus(){
      
        $query = $this->db->query("select a.*,b.*,c.*,d.project_name
                        from menu_group a
                        left join project_group b on a.project_group_id = b.project_group_id
                        left join menu c on a.menu_id = c.menu_id
                        left join m_project d on b.project_id = d.project_id
                        where a.deleted = 0
                        and b.deleted= 0
                        and c.deleted=0
                        and d.deleted=0
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
        $query = $this->db->query("select a.*,b.*,c.*,d.project_name
                        from menu_group a
                        left join project_group b on a.project_group_id = b.project_group_id
                        left join menu c on a.menu_id = c.menu_id
                        left join m_project d on b.project_id = d.project_id
                        where a.deleted = 0
                        and b.deleted= 0
                        and c.deleted=0
                        and d.deleted=0
                        and a.menu_group_id = ".$id."");

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

      public function getDataMenu($project_group_id,$menu_id) {
        

        $query = $this->db->query("SELECT a.* FROM menu_group a 
                                    where a.menu_id = ".$menu_id."
                                    and a.project_group_id = ".$project_group_id."
                                    and a.deleted= 0")->num_rows();
        

      
        return $query;
      
      }

      public function getMenus(){
      
        $query = $this->db->query("select menu_id as id,
                        CASE WHEN parent_id = 0 THEN CONCAT(menu_name,' [MENU HEADER] ') ELSE menu_name END as text 
                        from menu
                         where deleted = 0
                         order by menu_order")->result();


        return json_encode($query);
    }


	
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */