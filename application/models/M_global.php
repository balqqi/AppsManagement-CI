<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {

	public function get_list_menus($role, $level = null, $parent = null)
	{

        $where = '';

        if($parent != null){
            $where .= "and b.parent_id = ".$parent."";
        }

        $query = $this->db->query("select b.* from menu_group a 
                                    left join menu b on a.menu_id = b.menu_id
                                    left join project_group d on a.project_group_id = d.project_group_id
                                    where a.project_group_id = ".$role."
                                    and b.level = ".$level."
                                    ".$where."
                                    and a.deleted = 0
                                    and b.deleted = 0
                                    and d.deleted = 0
                                    order by b.menu_order asc
                                    ");

        $result = $query->result_array();

		/*$this->db->select('m.*')
        			->from('menus as m')
        			->join('user_privileges as up','m.id = up.menu_id')
        			->where('up.role_id', $role)
        			->where('up.priv_read', 1)
        			->where('m.is_published', 1)
        			->order_by('m.menu_order', 'ASC');

        if($level !== null)
            $this->db->where('m.level', $level);

        if($parent !== null)
            $this->db->where('m.parent', $parent);
        
        $query = $this->db->get();

        if($query->num_rows() > 0)
            $result = $query->result_array();
        else
            $result = array(); */

        return $result;
	}

    public function get_menu($role_id, $link)
    {
        $this->db->select('m.id, m.menu, up.priv_read as access_module, 
                    CONCAT(up.priv_create,",",up.priv_update,",",up.priv_delete) as privileges')
                    ->from('menus as m')
                    ->join('user_privileges as up','m.id = up.menu_id')
                    ->where('up.role_id',$role_id)
                    ->where('link', $link);

        $query = $this->db->get();
   
        if($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;
    }
}

/* End of file Model_menus.php */
/* Location: ./application/models/Model_menus.php */