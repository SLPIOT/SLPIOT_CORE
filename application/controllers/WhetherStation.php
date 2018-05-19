<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WhetherStation extends CI_Controller {

	


	function __construct() { 
         parent::__construct(); 
		 $this->load->database();
    }
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('home');
	}

	/*
		controller for add whether station
	*/

	public function editStation(){
		$code = " stationID=\"". $this->input->get('Code')."\"";
		$this->load->model("database_model");	              

		$scripts_loc=array(
			'assets/plugins/switchery/switchery.min.js',
			'assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
			'assets/plugins/jquery-quicksearch/jquery.quicksearch.js',
			'assets/plugins/moment/moment.js',
			'assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js',
			'assets/Extra/Stations/EditStation.js'
		);

		$this->load->helper('url');
		$data['title'] ="New Station";
		$data['scripts'] = $scripts_loc;
		$data['station'] = $this->database_model->getAllDataWithParams("tstations","stationID, name, location, coordinates, owner_name,owner_address, owner_email, owner_mobile",$code);

		if(!$this->getUserSessionEnabled()){
			redirect(base_url().'Login');	
		}else{
			
			$this->load->view('Templete/header.php',$data);
			$this->load->view('Templete/title.php');
			$this->load->view('Templete/left_slide.php');
			$this->load->view('WhetherStation/editStation.php');
			$this->load->view('Templete/footer.php');
		}
	}

	public function newStation(){

		$this->load->helper('url');


		$scripts_loc=array(
			'assets/Extra/Stations/AddStation.js',
			'assets/plugins/switchery/switchery.min.js',
			'assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
			'assets/plugins/jquery-quicksearch/jquery.quicksearch.js',
			'assets/plugins/moment/moment.js',
			'assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js',
		);

		$data['title'] ="New Station";
		$data['scripts'] = $scripts_loc;

		if(!$this->getUserSessionEnabled()){
			redirect(base_url().'Login');	
		}else{
			

			$this->load->view('Templete/header.php',$data);
			$this->load->view('Templete/title.php');
			$this->load->view('Templete/left_slide.php');
			$this->load->view('WhetherStation/addStation.php');
			$this->load->view('Templete/footer.php');
		}	
	}

	public function viewStation(){

        $this->load->model("database_model");
        $this->data['stations'] = $this->database_model->getAllData("tstations","ID,stationID,name,location");
        $this->load->view('WhetherStation/viewStation',$this->data);
	}

	public function loadWhetherDetails(){
		
		$daterange = explode("-",$this->input->get('date'));
		$startdate = date("Y-m-d", strtotime($daterange[0]));
		$enddate = date("Y-m-d", strtotime($daterange[1]));
		$code = " stationID=\"". $this->input->get('Code')."\" AND Record_time between \"".$startdate ." 00:00:00\" AND \"".$enddate." 23:59:00\"";
		//echo $code ;
		$this->load->model("database_model");
        	$this->data['data_stream'] = $this->database_model->getAllDataWithParams ("data_stream","ID,Record_time,Humidity,Ext_temp,Int_temp,Intensity,Win_dir,Win_speed,Rain_gauge,,Altitude,Pressure,Soil_Moisture,Water_level,Batt,istsos",$code);
		$this->load->view('WhetherStation/stationViewer',$this->data);
	}
	
	public function loadAvgWhetherDetails(){
		
		$daterange = explode("-",$this->input->get('date'));
		$rate = $this->input->get('rate');
		$startdate = date("Y-m-d", strtotime($daterange[0]));
		$enddate = date("Y-m-d", strtotime($daterange[1]));
		$code = " stationID=\"". $this->input->get('Code')."\" AND Record_time between \"".$startdate ." 00:00:00\" AND \"".$enddate." 23:59:59\" Group by floor(hour(Record_time) / ".$rate.")";
		//echo $code ;
		$this->load->model("database_model");
        	$this->data['data_stream'] = $this->database_model->getAllDataWithParams 		
                                                                               ("data_stream","ID,Record_time AS Record_time,
                                                                               ROUND(AVG(Humidity),4) AS Humidity,
                                                                               ROUND(AVG(Ext_temp),4) AS Ext_temp,
                                                                               ROUND(AVG(Int_temp),4) AS Int_temp,
                                                                               ROUND(AVG(Intensity),4) AS Intensity,
                                                                               ROUND(AVG(Win_dir),4) AS Win_dir,
                                                                               ROUND(AVG(Win_speed),4) AS Win_speed,
                                                                               ROUND(SUM(Rain_gauge),4) AS Rain_gauge,
                                                                               ROUND(AVG(Pressure),4) AS Pressure,
                                                                               ROUND(AVG(Soil_Moisture),4) AS Soil_Moisture,
                                                                               AVG(Batt) AS Batt ",$code);
		$this->load->view('WhetherStation/stationViewerAvg',$this->data);
	}

	public function addStation(){
		
		$this->load->model("Station_Model");
		$this->load->model("database_model");
		// set data
		$this->Station_Model->setStationCode($this->input->post('txtStationCode'));
		$this->Station_Model->setStationName($this->input->post('txtStationName'));
		$this->Station_Model->setStationLocation($this->input->post('txtLocation'));

		$coord = "{\"lat\":\"".$this->input->post('txtCoordinatesLat')."\",\"lng\":\"".$this->input->post('txtCoordinatesLng')."\"}";
		
		$this->Station_Model->setStationCoordinates($coord);
		$this->Station_Model->setOwnername($this->input->post('txtOwnerName'));
		$this->Station_Model->setOwnerAddress($this->input->post('txtAddress'));
		$this->Station_Model->setOwnerEmail($this->input->post('txtemail'));
		$this->Station_Model->setOwnerMobile($this->input->post('txtMobile'));
		$this->Station_Model->setActive(0);

		
		$data = $this->Station_Model->toArray();
		$ret = $this->database_model->insertStation($data);

		// crete table for the GUID 
		if($ret == true)
			echo "Station Code : " . $this->input->post('txtStationCode');
		else
			echo "number : " . $this->input->post('txtStationCode');
					
	}
	// update station loadWhetherDetails
	public function updateStation(){

		$this->load->model("Station_Model");
		$this->load->model("database_model");
		// set data
		
		$this->Station_Model->setStationCode($this->input->post('txtStationCode'));
		$this->Station_Model->setStationName($this->input->post('txtStationName'));
		$this->Station_Model->setStationLocation($this->input->post('txtLocation'));
		$this->Station_Model->setStationCoordinates($this->input->post('txtCoordinates'));
		$this->Station_Model->setOwnername($this->input->post('txtOwnerName'));
		$this->Station_Model->setOwnerAddress($this->input->post('txtAddress'));
		$this->Station_Model->setOwnerEmail($this->input->post('txtemail'));
		$this->Station_Model->setOwnerMobile($this->input->post('txtMobile'));
		$this->Station_Model->setActive(0);

		
		$data = $this->Station_Model->toArray();
		$parm =$this->input->post('txtStationCode');
		$ret = $this->database_model->updateStation($data,$parm);

		// crete table for the GUID 

		if($ret==true)
			echo "Station Code : " . $this->Station_Model->getStationCode();
		else
			echo "number : " . $this->Station_Model->getStationCode();
	}
	// delete addStation
	
	public function deleteStation(){

		$this->load->model("Station_Model");
		$this->load->model("database_model");

		$parm =$this->input->post('txtStationCode');

		$ret = $this->database_model->DeleteStation($parm);

		// crete table for the GUID 

		if($ret==true)
			echo "Station Code : " . $parm;
		else
			echo "number : " . $parm;
	}
	// get parameters
	public function getPrmeterList(){
		$res = $this->db->get("tparameters");
		$result = $res->result_array();
		$str="{</br>";
		foreach($result as $row){
			$str = $str . $row["Name"];
			$str = $str . "</br>";	
		}	
		$str=$str . "}";
		echo $str;
	}

	private function getUserSessionEnabled(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}
}
