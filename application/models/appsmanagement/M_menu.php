<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

	public function getDataMenus(){
      
        $query = $this->db->query("select a.*,b.project_name,c.menu_name as parent_name
                        from menu a
                        left join m_project b on a.project_id = b.project_id
                        left join menu c on a.parent_id = c.menu_id
                        where a.deleted = 0
                        order by  a.menu_order")->result_array();
        return $query;
	}

	public function getParents(){
      
        $query = $this->db->query("select 0 as id,'Tidak ada Parent' as text
                                union all 
                                select menu_id as id,menu_name as text from menu
        			     where deleted = 0")->result_array();


        return json_encode($query);
	}



        public function getdata_byid($id){
        $query = $this->db->query("select a.*,b.project_name,c.menu_name as parent_name
                                            from menu a
                                            left join m_project b on a.project_id = b.project_id
                                            left join menu c on a.parent_id = c.menu_id
                                            where a.deleted = 0
                                        and a.menu_id = ".$id."");

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