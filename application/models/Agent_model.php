<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    function select_all(){
        $query = $this->db->query('select * from admin');
        return $query->result();
    }

    function check_admin_exist($admin_name){
        $this -> db -> select('id, name,pwd,salt2,power');
        $this -> db -> from('admin');
        $this -> db -> where('name', $admin_name);
        $this -> db -> limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->first_row();
        }else{
            return false;
        }
    }
    

}

/* End of file Agent_model.php */
/* Location: ./application/models/Agent_model.php */


 ?>