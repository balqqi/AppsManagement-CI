<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Functions{

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('M_global');
	}

	public function generate_menu()
	{
		$menus = $this->CI->M_global->get_list_menus($this->CI->session->project_group_id, 0, NULL);
		
		$menu_list = '';
		foreach($menus as $m) {
			// level 0 as parent
			$id = $m['menu_id'];

			// level 1
			$menu1 = $this->CI->M_global->get_list_menus($this->CI->session->project_group_id, 1, $id);
			if(count($menu1) > 0) {
				$menu_list .= '<li class="sidebar-item  has-sub">
                					<a href="#" class="sidebar-link">
                    					<i class="fa '.$m['icon'].'"></i>
                    					<span>'.$m['menu_name'].'</span>
                					</a>';

				$menu_list .= '<ul class="submenu">';
				foreach($menu1 as $m1) {
					$id = $m1['menu_id'];

					// level 2
					$menu2 = $this->CI->M_global->get_list_menus($this->CI->session->project_group_id, 2, $id);
					
					$menu_list .= '<li class="submenu-item ">
                        				<a href="'.base_url($m1['controller_name']).'">'.$m1['menu_name'].'</a>
                    				</li>';
					
				}
				$menu_list .= '</ul></li>';
			} else {
				$menu_list .= '<li class="sidebar-link"><a href="'.base_url($m['controller_name']).'">  <i class="fa '.$m['icon'].'"></i><span>'.$m['menu_name'].'</span></a>
            </li>';
			}

			//dd($m['id']);
		}

		return $menu_list;
	}

	// check priv for check button hide and show
	/*
	public function check_priv($role_id, $link)
	{

        $menu = $this->CI->menus->get_menu($role_id, $link);

        return $menu;
    }

    // check access read if passing module by url
    public function check_access($role_id, $link)
    {
        $module = $this->CI->menus->get_menu($role_id, $link);
        
        $grant_access = $module['access_module'];

        if($grant_access == 0){
            show_404();
        }
    }

    // check access create, update, delete if passing sub by url
    public function check_access2($role_id, $link, $action_module) 
    {
        $action_module = strtolower($action_module);
        $module = $this->CI->menus->get_menu($role_id, $link);

        $submodule = $module['privileges'];
        $privileges = explode(',', $submodule);

        switch($action_module){
            case "add"   	: $grant_access = $privileges[0]; break;
            case "update"   : $grant_access = $privileges[1]; break;
            case "delete"   : $grant_access = $privileges[2]; break;
            default         : $grant_access = 0; break;
        }

        if($grant_access == 0){
            show_404();
        }
    }
    */

    public function is_login()
    {
    	if(!isset($this->CI->session->logged_in)) redirect('auth');
    }
    

}