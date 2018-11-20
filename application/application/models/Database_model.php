<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   class database_model extends CI_Model {
   	
   	public function __construct()
    	{
        	parent::__construct();
    	}

       function insertStation($data){
         $r = $this->db->insert('tstations',$data);
         if($r)
            return true;
         else
            return false;  
       }

       function getAllData($tablename,$selections){
         $this->db->select($selections);
         $this->db->from($tablename);
         $query = $this->db->get();
         return $query->result();
       }

       function getAllDataWithParams($tablename,$selections,$params){
         $this->db->select($selections);
         $this->db->from($tablename);
         $this->db->where($params);
         $query = $this->db->get();
         return $query->result();
       }

       function updateStation($data,$parm){
         $this->db->where('stationID', $parm);
         $r = $this->db->update('tstations',$data);
         if($r)
            return true;
         else
            return false;

       }

       function DeleteStation($parm){
        $this->db->where('stationID', $parm);
        $r = $this->db->delete('tstations');
        if($r)
           return true;
        else
           return false;

      }

       // User model functions
       function getUserInformation($username,$password){
         $this->db->select('`Username`, `UserType`,`UserID`');
         $this->db->from("iUsers");
         $this->db->where("(Username='".$username."' OR Email='".$username."') AND Password='".$password."' ");
         $query = $this->db->get();
         return $query->result();
       }

       function getStations($userId,$usertype){
        if($usertype == 1){
          $this->db->select('`stationid`, `name`');
          $this->db->from("tstations");
          $query = $this->db->get();
          return $query->result();
        } 
        $this->db->select('`tstationuser.stationid`, `tstations.name`');
        $this->db->from("tstations");
        $this->db->join("tstationuser","tstationuser.stationid = tstations.stationID", "right");
        $this->db->where("tstationuser.userid ='".$userId."'");
        $query = $this->db->get();
        return $query->result();
       }

       function getStationName($stationID){
        $this->db->select('`name`');
        $this->db->from("tstations");
        $this->db->where("tstations.stationID ='".$stationID."'");
        $query = $this->db->get();
        return $query->result()[0]->name;
       }

       function getUserSessionEnabled(){
        if(isset($this->session->userdata['logged_in'])){
          return true;
        }else{
          return false;
        }
      }

      function getUpdatedResult($stationID){
        $this->db->select('*');
        $this->db->from("data_stream");
        $this->db->where("stationID ='".$stationID."'ORDER BY Record_time DESC LIMIT 0 , 1 ");
        $query = $this->db->get();
        return $query->result_array();
      }

      function getUpdatedRainResult($stationID){
        $this->db->select('Rain_gauge AS RG');
        $this->db->from("data_stream");
        $this->db->where("stationID ='".$stationID."'ORDER BY Record_time DESC LIMIT 0 , 10 ");
        $query = $this->db->get();
        return $query->result_array();
      }

      function getLatestRecords($stationID){
        $code = " stationID=\"". $stationID."\" ORDER BY Record_time ASC  Limit 0,30";
		    return $this->database_model->getAllDataWithParams ("data_stream","Record_time,Humidity,Ext_temp,Int_temp,Intensity,Win_dir,Win_speed,Rain_gauge,Pressure,Soil_Moisture",$code); 

      }
      
      function getLatestRecord($stationID){
        $code = " stationID=\"". $stationID."\" ORDER BY Record_time DESC  Limit 0,1";
		    return $this->database_model->getAllDataWithParams ("data_stream","Record_time,Humidity,Ext_temp,Int_temp,Intensity,Win_dir,Win_speed,Rain_gauge,Pressure,Soil_Moisture",$code); 

      }

      function getLatestRecordTime($stationID){
        $code = " stationID=\"". $stationID."\" ORDER BY Record_time DESC  Limit 0,1";
		    return $this->database_model->getAllDataWithParams ("data_stream","Record_time",$code); 

      }

      function insertRawData($data){

        $inData = array(
          "stationID" => $data->GUID,
          "Humidity"  => $data->H,
          "Ext_temp"  => $data->TE,
          "Int_temp"  => $data->TI,
          "Intensity" => $data->L,
          "Win_speed" => $data->WS,
          "Win_dir"   => $data->WD,
          "Rain_gauge"=> $data->RG,
          "Pressure"  => $data->P,
          "Altitude"  => $data->AT,
          "Soil_Moisture"=> $data->SM,
          "Batt"=> $data->BV,
          "Record_time"=> $data->dt
        );
        
        if($this->db->insert('data_stream', $inData))
            return true;
        else
            return false;
      }

      function insertLog($data){
        $logData =array(
          "log" =>  $p=$data->GUID ." - ". $data->dt
        );

        $this->db->insert('tLog', $logData);
      }

       
       function createTable($tablename,$patameterList){


       }
   }

?>