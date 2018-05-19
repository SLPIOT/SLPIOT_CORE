<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   class User_Model extends CI_Model {

        private $username;
        private $usertype;
        private $userid;

        public function getUsername(){
            return $this->username;
        }

        public function getUsertype(){
            return $this->usertype;
        }

        public function getUserID(){
            return $this->userid;
        }

        public function login($username_, $password_){
            $this->load->database();
            $this->load->model("database_model");
            $this->data = $this->database_model->getUserInformation($username_,$password_);

            if(!empty($this->data)){
                $this->username = $this->data[0]->Username;
                $this->usertype = $this->data[0]->UserType;
                $this->userid = $this->data[0]->UserID;
            }else{
                $this->usertype=0;
            }
            
            return $this;
        }

        public function getReadableStations($userid){
            $this->load->database();
            $this->load->model("database_model");
            return $this->database_model->getStations($userid,$_SESSION['usertype']);
            
        }

   }  
?>