<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StationInfo extends CI_Controller {

	private $scripts=array(
		'assets/Extra/CurruntInfo/Curruntinfo.js',
		'assets/plugins/jquery-knob/jquery.knob.js',
		'assets/plugins/morris/morris.min.js',
		'assets/plugins/raphael/raphael-min.js',
		'assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
		'assets/pages/jquery.other-charts.js',
		'assets/pages/datatables.init.js',

	);

	private $css_links=array(
		'assets/plugins/morris/morris.css'
    );


	function __construct() { 
         	parent::__construct(); 
		 $this->load->database();
	}

    function index($param){
		$this->load->helper('url');
		$this->load->model('database_model');
		$data['title'] ="Currunt status : " . $this->database_model->getStationName($param);
		$data['stationID'] = $param;
		$data['scripts'] = $this->scripts;
		$data['links'] = $this->css_links;

		$data['station_data'] = $this->database_model->getLatestRecords($param); 

		if(!$this->database_model->getUserSessionEnabled()){
			redirect(base_url().'Login');	
		}else{

			$this->load->view('Templete/header.php',$data);
			$this->load->view('Templete/title.php');
			$this->load->view('Templete/left_slide.php');
			$this->load->view('CurruntInfor/StationInfo.php',$data);
			$this->load->view('Templete/footer.php',$data);
		}	
	}


	
}