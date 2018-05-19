<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   class database_model extends CI_Model {

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
        $code = " stationID=\"". $stationID."\" ORDER BY Record_time ASC  Limit 0,10";
		    return $this->database_model->getAllDataWithParams ("Data_Stream","Record_time,Humidity,Ext_temp,Int_temp,Intensity,Win_dir,Win_speed,Rain_gauge,Pressure,Soil_Moisture",$code); 

      }

       
       function createTable($tablename,$patameterList){


       }
   }

?>