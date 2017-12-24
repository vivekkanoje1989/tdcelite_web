<?php

class user_model extends CI_Model {

    private $table = null;

    function __construct() {
        $this->table = 'users';
        parent::__construct($this->table);
    }

    function get_users() {
    	$query = $this->db->query("SELECT * FROM users");
		if($query->num_rows() > 0){
			$user_info = $query->result();
           	return $user_info;							            
		}
    }

    function is_admin($user_id) {
        $querychk = $this->db->get_where('users',array('id' => $user_id));
        if($querychk->num_rows() > 0){
            $user_admin = $querychk->result()[0]->admin;
            return $user_admin;                                      
        }
    }

    function set_my_task ($data) {
        $querychk = $this->db->get_where('employee_task',$data);
        if($querychk->num_rows() === 1){
            $chk = $querychk->row();
            $this->db->where(array( 'id' => $chk->id));
            $query = $this->db->update('employee_task', $data);
            /*$task_info = "Upadater";           
            return $task_info;*/
        }else{
            $query = $this->db->insert('employee_task', $data);
            /*$task_info = "inserter";                      
            return $task_info;*/
        }
    }

    function get_my_task ($datas) {
        $query = $this->db->get_where('employee_task', $datas);
        if($query->num_rows() > 0){            
            $tasks = $query->result();          
            return $tasks;
        }else{}
    }
    
    function update_my_task ($id, $my_task) {
        $this->db->where(array('id' => $id ));
        $this->db->update('employee_task', array('emp_task' => $my_task ));
    }

    function get_employee($emp_id) {
        $query = $this->db->query("SELECT * FROM users WHERE id = '".$emp_id."'");       
        if($query->num_rows() === 1){
            $emp_info = $query->row();
            return $emp_info;                                      
        }
    }
    
    function approve_emp_task($id) {
        $this->db->where(array( 'id' => $id));
        $query = $this->db->update('employee_task', array( 'approve' => 'approved'));
        if ($query) {
           return 1;
        }else{
           return 0;            
        }
    }

    function approve_emp_task_tble($project_id, $emp_id, $reportrangeA, $reportrangeB) {

        $this->db->select('*');
        $this->db->from('employee_task');
        $this->db->where('task_date >',$reportrangeA);
        $this->db->where('task_date <',$reportrangeB);
        $this->db->where('project_id =',$project_id);
        $this->db->where('emp_id =',$emp_id);
        $this->db->where('approve !=',"approved");
        $this->db->order_by("task_date", "DESC");
        $tasks = $this->db->get();
        return $tasks->result();
    }

    function approve_emp_task_tble_report($project_id, $emp_id, $reportrangeA, $reportrangeB) {

        $this->db->select('*');
        $this->db->from('employee_task');
        $this->db->where('task_date >',$reportrangeA);
        $this->db->where('task_date <',$reportrangeB);
        $this->db->where('project_id =',$project_id);
        $this->db->where('emp_id =',$emp_id);        
        $this->db->order_by("task_date", "DESC");
        $tasks = $this->db->get();
        return $tasks->result();
    }

    function update_send_email_config($data) {
        $id = 1;
        $this->db->where(array( 'id' => $id));
        $query = $this->db->update('email_config', $data);
        if ($query) {
           return 1;
        }else{
           return 0;            
        }
    }
}