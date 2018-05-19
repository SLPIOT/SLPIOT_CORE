<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api extends CI_Controller {
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
}