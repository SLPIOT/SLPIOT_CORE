<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct() { 
         parent::__construct(); 	 
    }
    
    public function index()
    {
	$this->load->database();
    }

    // http://slpiot.org/api/getLatestRecordForLCD/Id
    
    public function getLatestRecordForLCD(){
    	$stid = '89379a9b-66a1-6a';
    	$this->load->model('database_model');
        $res = $this->database_model->getLatestRecord($stid);
		echo json_encode($res);
    }
    
    public function getLatestRecordForLCD10($displayID,$param){
    	$stid = 'e13ed2f7-c046-47';
    	$this->load->model('database_model');
        $res = $this->database_model->getLatestRecordsinFields($stid,$param);
        $std = json_decode(json_encode($res),true);
        
        $str="";
        
        $max = 0;
        
        foreach($std as $record){
          $val = array_values($record)[0];
          if($val>$max){
          	$max= $val;
          }
	}
        foreach($std as $record){
          $val = (100/($max+1) ) *  array_values($record)[0];
          
          $str = $str . round($val).",";
	}
	echo $str."+";
	}	
	
	public function isOnline($stationid){
		$this->load->model('database_model');
		$res = $this->database_model->getLatestRecordTime($stationid);
		if(sizeof($res) ==  0)
			return false;
		$res= $res[0]->Record_time;

		$now = date("Y-m-d H:i:s");
		$now = date("Y-m-d H:i:s",strtotime('+5 hours +30 minutes', time()));
		$comp = date("Y-m-d H:i:s",strtotime($res));
		$datediff= abs(strtotime($now) - strtotime($comp) )/ ( 60 );

		if($datediff > 60)
			echo false;
		else
			echo true;
	}
		
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

	public function insertData(){
		$this->load->model('database_model');

		// $auth = $this->input->server('PHP_AUTH_USER');
		// if($auth !== ""){
		// 	echo "{\"message\":\"Authentication Error\",\"success\": false,\"auth\":\"".$auth."\"}";
		// 	return;
		// }

		$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
		if($stream_clean == null){
			echo "Error: No Data";
			die;
		}
		$data = json_decode($stream_clean);

		$result = $this->database_model->insertRawData($data);

		// save in log
		$this->database_model->insertLog($data);
		if ($result === TRUE) {
			echo "{\"message\":\"Thanks for data\",\"success\": true}";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	public function test(){
		echo "OK";
	}

	public function Station($url){
		$url = base_url().'StationInfo/index/'.$url;
		redirect($url);
	}
}
?>