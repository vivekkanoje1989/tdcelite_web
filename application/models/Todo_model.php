<?php

class todo_model extends CI_Model {

    private $table = null;

    function __construct() {
        $this->table = 'my_todo';
        parent::__construct($this->table);
    }

    function get_my_todo_all() {
        
        $todo_by = $this->session->userdata['logged_in']['user_id'];
        $this->db->select('*');
        $this->db->from('my_todo');
        $this->db->where('todo_by =',$todo_by);
        $this->db->order_by("todo_time", "DESC");
        $my_todo_list = $this->db->get();
        return $my_todo_list->result();
    }
    
    function get_my_todo() {
        $limit = 10;
        $todo_by = $this->session->userdata['logged_in']['user_id'];
        $this->db->select('*');
        $this->db->from('my_todo');
        $this->db->limit($limit);
        $this->db->where('todo_by =',$todo_by);
        $this->db->order_by("todo_time", "DESC");
        $my_todo_list = $this->db->get();
        return $my_todo_list->result();
    }
    
    function my_todo_chk($id) {
        //$fp = fopen("log.txt", "a+");
        //fwrite($fp,"\r\n my_todo_chk inside");
        //fwrite($fp,"\r\n my_todo_chk id" . print_r($id, true));
        $this->db->where(array( 'id' => $id));
        $this->db->update('my_todo', array('todo_checked' => "Checked"));
        //fwrite($fp,"\r\n my_todo_chk query". print_r($this->db->last_query(), true));      
        //fclose($fp);          
    }
    
    function my_todo_del($id) {
        // $fp = fopen("log.txt", "a+");
        // fwrite($fp,"\r\n my_todo_del inside");
        // fwrite($fp,"\r\n my_todo_del id" . print_r($id, true));
        $this->db->where(array( 'id' => $id));        
        $this->db->delete('my_todo');
        // fwrite($fp,"\r\n my_todo_del query". print_r($this->db->last_query(), true));       
        // fclose($fp);          
    }
    
    function my_todo_insert($data) {
        // $fp = fopen("log.txt", "a+");
        // fwrite($fp,"\r\n my_todo_insert inside");
        // fwrite($fp,"\r\n my_todo_insert todo" . print_r($data, true));
        $this->db->insert('my_todo', $data);                
        // fwrite($fp,"\r\n my_todo_insert query". print_r($this->db->last_query(), true));       
        // fclose($fp);          
    }
    
    function get_toUpdate_my_todo($id) {
        $limit = 1;        
        $this->db->select('*');
        $this->db->from('my_todo');
        $this->db->limit($limit);
        $this->db->where('id =',$id);
        $my_todo_list_update = $this->db->get();
        return $my_todo_list_update->result();
    }
    
    function my_todo_update($id, $todo) {
        // $fp = fopen("log.txt", "a+");
        // fwrite($fp,"\r\n my_todo_update inside");
        // fwrite($fp,"\r\n my_todo_update id" . print_r($id, true));
        // fwrite($fp,"\r\n my_todo_update todo" . print_r($todo, true));
        $this->db->where(array( 'id' => $id));
        $this->db->update('my_todo', array('todo' => $todo));
        // fwrite($fp,"\r\n my_todo_chk query". print_r($this->db->last_query(), true));      
        // fclose($fp);          
    }
}