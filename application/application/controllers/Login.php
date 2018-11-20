<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $scripts_loc=array(
        'assets/js/modernizr.min.js',
        'assets/Extra/Login/login.css'
    );
    
    private $css_links=array(
        'assets/Extra/Login/login.css'
    );

	function __construct() { 
         parent::__construct(); 
		 $this->load->database();
	}
	

	public function index()
	{
	
        if(isset($this->session->userdata['logged_in'])){
            redirect(base_url().'Dashboard');
        }else{
            $this->loadUserModel();
        }
	}

    public function signin(){
        $username = $this->input->post("txt_uname_email");
        $password = $this->input->post("txt_password");

        $this->load->model('User_Model');
        $usermodel = $this->User_Model->login($username,$password);
        
        if($usermodel->getUsertype() == 0){
            redirect(base_url().'Login');
        }else{
            $this->session->userdata['logged_in'] =true;
            $this->session->userdata['userid'] = $usermodel->getUserID();
            $this->session->userdata['username'] = $usermodel->getUsername();
            $this->session->userdata['usertype'] = $usermodel->getUsertype();
            
            redirect(base_url());
        }
    }

    public function loadUserModel(){
        $this->load->helper('url');
        $data['title'] ="";
        $data['links'] = $this->css_links; 
		$data['scripts'] = $this->scripts_loc;

        $this->load->view('Templete/header.php',$data);
	$this->load->view('Login/login.php');
	$this->load->view('Templete/footer.php',$data);
    }
    
    public function signout(){
        unset($_SESSION['logged_in']);
        if(!isset($this->session->userdata['logged_in']))
            redirect(base_url());
    }

}
