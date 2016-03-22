<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function index()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('agent_model');
    }

}

/* End of file Agent.php */
/* Location: ./application/controllers/Agent.php */
 ?>