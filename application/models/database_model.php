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

       function getStations($userId){
        $this->db->select('`tstationuser.stationid`, `tstations.name`');
        $this->db->from("tstations");
        $this->db->join("tstationuser","tstationuser.stationid = tstations.stationID", "right");
        $this->db->where("tstationuser.userid ='".$userId."'");
        $query = $this->db->get();
        return $query->result();
       }

       
       function createTable($tablename,$patameterList){


       }
   }

?>