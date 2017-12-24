<?php

class project_model extends CI_Model {

    private $table = null;

    function __construct() {
        $this->table = 'projects';
        parent::__construct($this->table);
    }

    function get_projects() {
    	$query = $this->db->query("SELECT * FROM projects");
		if($query->num_rows() > 0){
			$project_info = $query->result();
           	return $project_info;							            
		}
    }

    function assign_projects($data) {
        //print_r($data);
        $querychk = $this->db->get_where('project_timesheet',$data);
        if($querychk->num_rows() === 1){
            $chk = $querychk->row();
            $this->db->where(array( 'id' => $chk->id));
            $query = $this->db->update('project_timesheet', $data);
        }else{
            $query = $this->db->insert('project_timesheet', $data);
        }

        if ($query) {
            return 1;
        }else{
            return 0;
        }
    }

    function get_projects_assign_toME($emp_id) {
        $querychk = $this->db->query("SELECT project_id FROM project_timesheet WHERE assignt_to ='".$emp_id."' ");
        if($querychk->num_rows() > 0){
            $project_ids = $querychk->result();

            $arrayId = array();
            foreach ($project_ids as $ids) {
                
                $query = $this->db->query("SELECT * FROM projects WHERE id IN ('".$ids->project_id."')");
                if($query->num_rows() > 0){
                    $project_info = $query->result();                                                       
                }
                if (empty($arrayId)) {
                   $arrayId = $ids->project_id;
                }else{
                    $arrayId .= ','.$ids->project_id.'';
                }
                
            }       

            $query = $this->db->query("SELECT * FROM projects WHERE id IN ($arrayId)");
            if($query->num_rows() > 0){
                $project_info = $query->result();                                              
            }
            //echo "last query";
            //print_r($this->db->last_query());
            
            return $project_info;
        }/*if*/
    }

    function my_assign_task($project_id, $emp_id) {
        if ($project_id && $emp_id) {
            
            $querychk = $this->db->query("SELECT * FROM project_timesheet WHERE assignt_to ='".$emp_id."' AND project_id ='".$project_id."' ORDER BY id DESC LIMIT 1 ");
            if($querychk->num_rows() > 0){
                $My_project = $querychk->result();
                return $My_project;
            }else{
                return $My_project = "";
            }
            
        }
    }
}