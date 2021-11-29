<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
	}

	
	public function index(){
		require "vendor/autoload.php";
        $google_client = new Google_Client();

        $google_client->setClientId('450951866509-eria03lc8sc45br4n80gcvi2io5g53v4.apps.googleusercontent.com'); //Define your ClientID

        $google_client->setClientSecret('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'); //Define your Client Secret Key

        $google_client->setRedirectUri('http://localhost:82/tmes/auth'); //Define your Redirect Uri

        $google_client->addScope('email');

        $google_client->addScope('profile');

        if(isset($_GET["code"]))
        {
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

                if(!isset($token["error"]))
                {
                    $google_client->setAccessToken($token['access_token']);

                    $this->session->set_userdata('access_token', $token['access_token']);

                    $google_service = new Google_Service_Oauth2($google_client);

                    $data = $google_service->userinfo->get();




           

                    $current_datetime = date('Y-m-d H:i:s');

                    $user = $this->m_auth->check_login($data['email']);

             

                  
                    if(!empty($user)) {

                    	$sess_data = [
						'logged_in' => TRUE,
						'employee_id'	=> $user['employee_id'],
						'id'		=> $user['id'],
						'username'	=> $user['username'],
						//'redirect_back' => $_SERVER['HTTP_REFERER'],
						'nama_user' => $user['nama']
						
					];

                    
					$this->session->set_userdata($sess_data);

					$datalogin['last_login'] = date('Y-m-d H:i:s');

                    if(isset($user['id'])){
                        $this->db->where('id',$user['id']);
                        $this->db->update('users',$datalogin);
                    }
				
					
					redirect('home');
					



                    }else{

                       

                    	$this->do_logout();

                    }

                  
                }
        }
            $login_button = '';
            if(!$this->session->userdata('access_token'))
                {

                	
                    $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'assets/images/button-login-google.jpg" width="350"/></a>';
                    $data['login_button'] = $login_button;
                 
                   
                    $this->load->view('v_login', $data);
                }
                else
                {

                    
                	
                    $this->do_logout();
                }
                


	}

    public function do_logout(){


        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('sess_data');
        $this->session->sess_destroy();
        redirect('auth');
    }
}
