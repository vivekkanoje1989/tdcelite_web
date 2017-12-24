<?php

class events_model extends CI_Model {

    private $table = null;

    function __construct() {
        $this->table = 'events';
        parent::__construct($this->table);
        $this->load->helper('file');
    }

    function add_event_now($id, $dates, $times, $location, $events, $event_by) {
        $fp = fopen("log.txt", "a+");
        fwrite($fp,"\r\n add_event_now inside");

        $data = array(
                'event_date' => $dates,
                'event_time' => $times,
                'location' => $location,
                'event' => $events,
                'event_by' => $event_by
            );
      
        if($id == "save"){
            $query = $this->db->insert('events', $data);
            fwrite($fp,"\r\n add_event_now querychk insert". print_r($this->db->last_query(), true));

            $event_info = "inserter";                      
            return $event_info;           
        }else{
             $this->db->where(array( 'id' => $id));
            $query = $this->db->update('events', $data);
            fwrite($fp,"\r\n add_event_now querychk update". print_r($this->db->last_query(), true));

            $event_info = "Upadater";           
            return $event_info;
        }
       fclose($fp);     
         
    }

    function get_event_All() {        
        $this->db->select('*');
        $this->db->from('events');
        $all_events = $this->db->get();
        return $all_events->result();
    }
    
    function get_event_frmToday() { 
        //$fp = fopen("log.txt", "a+");
        //fwrite($fp,"\r\n get_event_frmToday inside");
        $today = date('Y-m-d');
        //fwrite($fp,"\r\n get_event_frmToday today". print_r($today, true));

        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('event_date >=', $today);
        $this->db->order_by("event_date", "ASC");
        $all_events_frmtoday = $this->db->get();
        //fwrite($fp,"\r\n get_event_frmToday query". print_r($this->db->last_query(), true));
        //fclose($fp); 
        return $all_events_frmtoday->result();
    }

    function remove_event_now($id) {
        $data = array(
                'id' => $id
            );
        $this->db->where($data);
        $this->db->delete('events');
    }

}