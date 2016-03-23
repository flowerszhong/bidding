<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('agent_model');
    }

    public function index()
    {
        $view_data = array();
        // $sess_admin = $this->session->userdata('admin_logged');
        // $power = $sess_admin['power'];
        // if($power > 0){
            // $admins = $this->admin_model->select_all();
            // $view_data['admins'] = $admins;
        // }
        
        $agents = $this->agent_model->select_all();
        $view_data['agents'] = $agents;

        $main_content = $this->load->view('agent_index', $view_data, true);
        $data=array('main_content'=>$main_content);
        $this->load->view('template',$data);
    }

    public function create(){
        $view_data = array();

        if(!$this->input->post()){
            $main_content = $this->load->view('agent_create',$view_data,true);
            $data = array('main_content'=>$main_content);
            $this->load->view('template', $data, FALSE);
            return true;
        }

        $this->form_validation->set_rules('name', '标题', 'trim|required|xss_clean|min_length[2]|max_length[60]');
        $this->form_validation->set_rules('description', '内容', 'trim|required|xss_clean');

        if($this->form_validation->run() == True){
            $data = $this->input->post();
            $data['regdate'] = date("Y-m-d H:i:s");
            $data['available'] = 1;
            if (!$this->agent_model->create($data)) {
                return false;
            }else{
                redirect('agent/index','refresh');
            }
        }

    }

}

/* End of file Agent.php */
/* Location: ./application/controllers/Agent.php */
 ?>