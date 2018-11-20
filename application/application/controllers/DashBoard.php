<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashBoard extends CI_Controller {

	private $scripts_loc=array(
		// 'assets/plugins/jquery-knob/jquery.knob.js',
    	// // 'assets/plugins/jquery-circliful/js/jquery.circliful.min.js',
		'assets/plugins/morris/morris.min.js',
    	// // 'assets/plugins/raphael/raphael-min.js',
    	// 'assets/pages/jquery.dashboard.js',
    	// 'assets/plugins/gmaps/gmaps.min.js',
    	// 'assets/pages/jquery.gmaps.js',
    	// 'assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
    	// 'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    	// 'assets/plugins/jvectormap/gdp-data.js',
    	// 'assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js',
    	// 'assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js',
    	// 'assets/plugins/jvectormap/jquery-jvectormap-au-mill.js',
		// 'assets/plugins/jvectormap/jquery-jvectormap-ca-lcc.js',
		'assets/Extra/Dashboard/Dashboard.js',
	);

	function __construct() { 
                 parent::__construct(); 
		 $this->load->database();
	}
	

	public function index()
	{
		$this->load->helper('url');
		$data['title'] ="Dashboard";
		$data['scripts'] = $this->scripts_loc;

		
		if(!$this->getUserSessionEnabled()){
			redirect(base_url().'Login');	
		}else{
			
			$data['stations'] = $this->getReadableStations($_SESSION['userid']);
			$this->load->view('Templete/header.php',$data);
			$this->load->view('Templete/title.php');
			$this->load->view('Templete/left_slide.php');
			$this->load->view('Dashboard/home.php',$data);
			$this->load->view('Templete/footer.php',$data);
		}	
	
		

	}

	/*
		controller for add whether station
	*/
	public function getInformationOnUpdate($stid){
        	$this->load->model('database_model');
        	$res = $this->database_model->getUpdatedResult($stid);
		echo json_encode($res);
    	}
    	
    	public function getRainInformationOnUpdate($stid){
        	$this->load->model('database_model');
        	$res = $this->database_model->getUpdatedRainResult($stid);
		echo json_encode($res);
    	}

	public function getDataCentersAll(){
		$res = $this->db->get("tstations");
		$result = $res->result_array();
		return json_encode($result);
	}

	public function getStationLocations(){
		$res = $this->db->get("tstations");
		$result = $res->result_array();
		echo json_encode($result);
	}

	private function getUserSessionEnabled(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}

	private function getReadableStations($userid){
		$this->load->model("User_Model");
		return $this->User_Model->getReadableStations($userid);

	}

	public function Station($url){
		$url = base_url().'StationInfo/index/'.$url;
		redirect($url);
	}
	
}

?>
