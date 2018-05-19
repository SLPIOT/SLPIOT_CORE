<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   class Station_Model extends CI_Model {
    
        private $stationCode;
        private $name;
        private $location;
        private $coordintes;
        private $ownername;
        private $ownerAddress;
        private $ownerEmail;
        private $ownermobile;
        private $isActive;
      
        //php majic
            public function __get($property) {
                if (property_exists($this, $property)) {
                 return $this->$property;
                }
            }

            public function __set($property, $value) {
                if (property_exists($this, $property)) {
                    $this->$property = $value;
                }
                    return $this;
            }

      // getters
      public function getStationCode(){
          return $this->stationCode;
      }

      public function getStationName(){
          return $this->name;
      }
      public function getLocation(){
          return $this->location;
      }
      public function getCoordinates(){
          return $this->coordintes;
      }
      public function getOwnerName(){
          return $this->ownername;
      }
      public function getOwnerAddress(){
          return $this->ownerAddress;
      }
      public function getOwnerEmail(){
          return $this->ownerEmail;
      }
      public function getOwnerMobile(){
          return $this->ownermobile;
      }
      public function getActive(){
          return $this->isActive;
      }
      //setters
      public function setStationCode($val){
          $this->stationCode=$val;
      }

      public function setStationName($val){
         $this->name = $val;
      }
      public function setStationLocation($val){
          $this->location = $val;
      }
      public function setStationCoordinates($val){
          $this->coordintes = $val;
      }
      public function setOwnername($val){
          $this->ownername = $val;
      }
      public function setOwnerAddress($val){
          $this->ownerAddress = $val;
      }
      public function setOwnerEmail($val){
          $this->ownerEmail = $val;
      }
      public function setOwnerMobile($val){
          $this->ownermobile = $val;
      }
      public function setActive($val){
          if(is_int($val))
            $this->isActive = $val;
      }

      function __construct() { 
         parent::__construct();
         
     }

      public function toArray(){

          $datav = array( 
                "stationID" => $this->stationCode, 
                "name" => $this->name, 
                "location" => $this->location, 
                "coordinates" => $this->coordintes, 
                "owner_name" => $this->ownername, 
                "owner_address" => $this->ownerAddress, 
                "owner_email" => $this->ownerEmail,
                "owner_mobile" => $this->ownermobile, 
                "is_active" => $this->isActive, 
            );
            return $datav;
      }

   }
?>