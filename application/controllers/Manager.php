<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('agent_model');
        $this->load->model('manager_model');
    }
    public function index()
    {
        $view_data = array();

        $view_data['managers'] = $this->manager_model->select_all();

        $main_content = $this->load->view('manager_index',$view_data,TRUE);

        $data = array('main_content'=>$main_content);

        $this->load->view('template', $data, FALSE);

    }

    public function create(){
        $view_data = array();
        if(!$this->input->post()){
            $view_data['agents'] = $this->agent_model->select_agent();

            $main_content = $this->load->view('manager_create', $view_data, true);

            $data = array('main_content'=>$main_content);

            $this->load->view('template', $data, FALSE);
            return true;
        }


        $data = $this->input->post();
        $data['regdate'] = date("Y-m-d H:i:s");

        if (!$this->manager_model->create($data)) {
            return false;
        }else{
            redirect('manager/index','refresh');
        }

    }



}

/* End of file Manager.php */
/* Location: ./application/controllers/Manager.php */

 ?>