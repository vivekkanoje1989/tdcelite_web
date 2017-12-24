<?php

class forgot_model extends CI_Model {

    private $table = null;

    function __construct() {
        $this->table = 'users';
        parent::__construct($this->table);
    }    

    function forgot_pass($email_id) {
        $limit = 1;
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('emailid',$email_id);
        $this->db->limit($limit);
        $mail = $this->db->get();
        return $mail->result();
    }
    
    function forgot_pass_mail($email_id,$emp_name,$pass) {
        $limit = 1;
        $id = 1;
        $this->db->select('*');
        $this->db->from('email_config');
        $this->db->where('id',$id);
        $this->db->limit($limit);
        $mail_conf = $this->db->get()->result();        
        
        $sender = $mail_conf[0]->email;
        $string = $mail_conf[0]->password;
        $protocol = $mail_conf[0]->smtp_encryption;
        $smtp_host = $mail_conf[0]->smtp_host;
        $smtp_port = $mail_conf[0]->smtp_port;
        
        $decpass = $email_smtp_pass = $this->encrypt_model->encrypt_decrypt('decrypt', $string);
        //print_r($decpass);

        if (1==1) {             
            $config = Array(
                    'protocol' => $protocol,
                    'smtp_host' => $smtp_host,
                    'smtp_port' => $smtp_port,
                    'smtp_user' => $sender,
                    'smtp_pass' => $decpass,
                    'mailtype'  => 'html', 
                    'charset'   => 'iso-8859-1'
                );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($sender);
            $this->email->to($email_id);
            $this->email->subject('TDCelite : Your password');
            $this->email->message('Dear '.$emp_name.',<br/><br/> Your passwor is <b>"'.$pass.'"</b><br/> <i>use this password for login to tdcelite.</i><br/><br/> Thank You!');
            $mailsend = $this->email->send();
            if ($mailsend) {
               $mail_status = "successful";
               return $mail_status;                
            }else{
                $mail_status = show_error($this->email->print_debugger());
                return $mail_status;
            }
        }
    }          
}