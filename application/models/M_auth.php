<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function check_login($username)
	{

		 $this->db->select('a.password,a.employee_id,a.id,a.username,b.nama');
         $this->db->from('users a');
         $this->db->join('m_employee b','a.employee_id = b.employee_id');
         $this->db->where('a.username',$username);
         $this->db->limit(1);
          $query = $this->db->get();
		
		
		if($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;

	}
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */