<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tdcelite extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*function __construct() {
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('url');
		$this->load->helper('file');

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');
	}
	*/
	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$creds = array(
			"emailid"=> $this->input->post('emailid'),
			"password"=> $this->input->post('password')
		);
		$query = $this->db->get_where('users', $creds);
		
		if($query->num_rows() === 1){
			$v = $query->row();
			$session_data = array(
							'user_id' => $v->id,
							'user' => $v->mem_name,
							'user_type' => $v->designation,
							);
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);
			$this->load->view('dashboard');
		}else{
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('login', $data);
		}			
	}

	public function logout()
	{
		// Removing session data
		$sess_array = array(
							'user' => '',
							'user_type' => '',
							);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
	}

	public function signup_page()
	{
		$this->load->view('signup');
	}
	
	public function go_setting_sendmail()
	{
		$this->load->view('email_setting');
	}

	public function forgot_page()
	{
		$this->load->view('forgot');
	}
	
	public function forgot_password()
	{   
		if (isset($_POST)) {
			$email_id = $this->input->post('emailid');
			$getpass = $this->forgot_model->forgot_pass($email_id);
			//print_r($getpass);			
		}
		if (sizeof($getpass) > 0) {
			$pass = $getpass[0]->password;
			$emp_name = $getpass[0]->mem_name;

			/*send password to registered email id*/
			$sentmail = $this->forgot_model->forgot_pass_mail($email_id,$emp_name,$pass);
			if ($sentmail == "successful") {
				$data['message_display'] = "Your password have been sent to your registered email id.<br/>>>>>".$email_id;
			}else{
				$data['error_message'] = "technical issues in sending mail to".$email_id;
			}
		}else{
			$data['error_message'] = $email_id." is not registered with us.";
		}	
		$this->load->view('forgot',$data);
	}

	public function do_signup()
	{
		
		if ($_POST['Submit'] == "Sign Up") {
			print_r($_POST);
			if ($_POST['password'] != $_POST['cpassword'] ) {
				$errmsg = "passcode didn't match";
				redirect('/tdcelite/signup_page/?msg='.$errmsg.'', 'refresh');
			}else{

				$employeeid = $_POST['employeeid'];
				$emailid = $_POST['emailid'];
				$password = $_POST['password'];
				$mem_name = $_POST['mem_name'];
				$designation = $_POST['designation'];
				$dob = $_POST['dob'];
				$gender = $_POST['gender'];
				$contactnum = $_POST['contactnum'];
				$contactnum2 = $_POST['contactnum2'];

				$data = array(
					"employeeid" => $employeeid,
				 	"emailid" => $emailid,
				 	"password" => $password,
				    "mem_name" => $mem_name,
				    "designation" => $designation,
				    "dob" => $dob,
				    "gender" => $gender,
				    "contactnum" => $contactnum,
				    "contactnum2" => $contactnum2
				);

        		$this->db->insert('users',$data);
        		$msgsuccess = "Successfully Signup...";
        		redirect('/tdcelite/signup_page/?msgsuccess='.$msgsuccess.'', 'refresh');        		
			}
		}else{}
	}

	public function go_dashboard()
	{
		$this->load->view('dashboard');		
	}

	public function go_employee_report()
	{
		$this->load->view('report');		
	}
	
	public function go_employee_timesheet()
	{
		$this->load->view('employee_timesheet');		
	}

	public function go_schedule_lead()
	{
		$this->load->view('Schedule_lead');		
	}

	public function go_events()
	{
		$this->load->view('events');		
	}

	public function go_events_form()
	{
		$this->load->view('events_form');		
	}

	public function go_approve_task()
	{
		$this->load->view('approve_task');		
	}

	public function assign_task()
	{	
		//print_r($_POST);
		//print_r($this->session);
		$assign_by = $this->session->userdata['logged_in']['user_id'];
		$data = array(
			'project_id' => $_POST['Project_id'],
			'assignt_to' => $_POST['Employee_id'],
			'assign_by' => $assign_by,
			'assign_period' => $_POST['daterange'],
			'Monday' => $_POST['Monday'],
			'Tuesday' => $_POST['Tuesday'],
			'Wednesday' => $_POST['Wednesday'],
			'Thursday' => $_POST['Thursday'],
			'Friday' => $_POST['Friday'],
			'Saturday' => $_POST['Saturday'],
			'Sunday' => $_POST['Sunday']
		);
		$assign_task = $this->project_model->assign_projects($data);
		if ($assign_task) {
			//$this->load->view('success/html/assign_task_success');
			$data['message'] = "Tasks successsfuly assigned.";
			$this->load->view('Schedule_lead', $data);
		}else{
			/*$this->load->view('errors/html/assign_task_error');*/	
			$data['error'] = "Tasks assigning unsuccessful.";			
			$this->load->view('Schedule_lead', $data);
		}				
	}

	public function get_My_schedule(){
		if (isset($_GET)) {
			//print_r($_GET);
			$tmp = [];
			$project_id = $_GET['project_id'];
			$emp_id = $_GET['emp_id'];
			
			$My_assign_task = $this->project_model->my_assign_task($project_id, $emp_id);
			$tmp['My_assign_task'] = $My_assign_task;
			
			$datas = array(
					'emp_id' => $emp_id,
					'project_id' => $project_id
				);
			$My_tasks = $this->user_model->get_my_task($datas);
			$tmp['My_tasks'] = $My_tasks;
			echo(json_encode($tmp));
		}
	}
	
	public function go_employee_task_model(){
		$this->load->view('modal_form');
	}

	public function save_employee_task(){
		if (isset($_GET)) {
			//print_r($_GET);
			$emp_id = $_GET['emp_id'];
			$project_id = $_GET['project_id'];
			$emp_task = $_GET['emp_task'];
			$data = array(
					'emp_id' => $emp_id,
					'project_id' => $project_id,
					'emp_task' => $emp_task
				);
			//print_r($data);
			$this->user_model->set_my_task($data);
			$datas = array(
					'emp_id' => $emp_id,
					'project_id' => $project_id
				);
			$tasks = $this->user_model->get_my_task($datas);
			echo(json_encode($tasks));
		}
	}

	
	public function update_employee_task(){
		if (isset($_GET)) {
			//print_r($_GET['id']);
			$id = $_GET['id'];
			$my_task = $_GET['emp_task'];
			$project_id = $_GET['project_id'];
			$emp_id = $_GET['emp_id'];			
			$this->user_model->update_my_task($id, $my_task);
			
			$datas = array(
					'emp_id' => $emp_id,
					'project_id' => $project_id
				);
			$tasks = $this->user_model->get_my_task($datas);
			echo(json_encode($tasks));		
		}		
	}
	
	public function approve_employee_task(){
		if (isset($_GET)) {
			$id = $_GET['id'];
			$project_id = $_GET['project_id'];
			$emp_id = $_GET['emp_id'];
			$reportrange = $_GET['reportrange'];
			$reportrange = explode('-', $reportrange);
				
			$reportrangeA = $reportrange[0];
			$reportrangeB = $reportrange[1];
			$reportrangeA = strtotime(date("Y-m-d", strtotime($reportrangeA)));
			$reportrangeB = strtotime(date("Y-m-d", strtotime($reportrangeB)) . " +1 days");
			$reportrangeA = date("Y-m-d", $reportrangeA);
			$reportrangeB = date("Y-m-d", $reportrangeB);	
			$approve = $this->user_model->approve_emp_task($id);
			if ($approve) {			
				$approve_data = $this->user_model->approve_emp_task_tble($project_id, $emp_id, $reportrangeA, $reportrangeB);
				echo(json_encode($approve_data));
			}
		}
	}
	public function approve_employee_task_data(){
		if (isset($_GET)) {
			//print_r($_GET);
			$project_id = $_GET['project_id'];
			$emp_id = $_GET['emp_id'];
			$reportrange = $_GET['reportrange'];
			$reportrange = explode('-', $reportrange);
			
			$reportrangeA = $reportrange[0];
			$reportrangeB = $reportrange[1];
			$reportrangeA = strtotime(date("Y-m-d", strtotime($reportrangeA)));
			$reportrangeB = strtotime(date("Y-m-d", strtotime($reportrangeB)) . " +1 days");
			$reportrangeA = date("Y-m-d", $reportrangeA);
			$reportrangeB = date("Y-m-d", $reportrangeB);
			//print_r($reportrange);
			//echo $reportrangeA;
			//echo $reportrangeB;
			$approve_data = $this->user_model->approve_emp_task_tble($project_id, $emp_id, $reportrangeA, $reportrangeB);
			echo(json_encode($approve_data));
		}
	}

	public function approve_employee_task_report(){
		if (isset($_GET)) {
			//print_r($_GET);
			$project_id = $_GET['project_id'];
			$emp_id = $_GET['emp_id'];
			$reportrange = $_GET['reportrange'];
			$reportrange = explode('-', $reportrange);
			
			$reportrangeA = $reportrange[0];
			$reportrangeB = $reportrange[1];
			$reportrangeA = strtotime(date("Y-m-d", strtotime($reportrangeA)));
			$reportrangeB = strtotime(date("Y-m-d", strtotime($reportrangeB)) . " +1 days");
			$reportrangeA = date("Y-m-d", $reportrangeA);
			$reportrangeB = date("Y-m-d", $reportrangeB);
			//print_r($reportrange);
			//echo $reportrangeA;
			//echo $reportrangeB;
			$approve_data = $this->user_model->approve_emp_task_tble_report($project_id, $emp_id, $reportrangeA, $reportrangeB);
			echo(json_encode($approve_data));
		}
	}

	public function add_event(){
		if (isset($_GET)) {
			//print_r($_GET);
			$id = $_GET['id'];
			$dates = $_GET['dates'];
			$times = $_GET['times'];
			$location = $_GET['location'];
			$events = $_GET['events'];
			$event_by = $this->session->userdata['logged_in']['user_id'];
			// $fp = fopen("log.txt", "a+");
   //      	fwrite($fp,"\r\n add_event ..id.". print_r($id, true));
   //      	fwrite($fp,"\r\n add_event ...". print_r($event_by, true));

			$result_event = $this->events_model->add_event_now($id, $dates, $times, $location, $events, $event_by);
        	//fwrite($fp,"\r\n add_event events_result...". print_r($result_event, true));
			$result_event_all = $this->events_model->get_event_All();       	
        	//fclose($fp);
			echo(json_encode($result_event_all));
		}
	}
	
	public function remove_event(){
		if (isset($_GET)) {
			//print_r($_GET);
			$id = $_GET['id'];
			$result_remove_event = $this->events_model->remove_event_now($id);
        	
			$result_event_all = $this->events_model->get_event_All();       	
        	
			echo(json_encode($result_event_all));
		}
	}

	public function event_onload(){
		if (isset($_GET)) {				
			$event_all_onload = $this->events_model->get_event_All();    	
			echo(json_encode($event_all_onload));
		}
	}

	public function event_onload_fmToday(){
		if (isset($_GET)) {				
			$event_all_frmtoday = $this->events_model->get_event_frmToday();    	
			echo(json_encode($event_all_frmtoday));
		}
	}

	public function get_my_todo_all(){
		if (isset($_GET)) {				
			$get_my_todo_all = $this->todo_model->get_my_todo_all();    	
			echo(json_encode($get_my_todo_all));
		}
	}

	public function get_my_todo_onload(){
		if (isset($_GET)) {				
			$get_my_todo_onloads = $this->todo_model->get_my_todo();    	
			echo(json_encode($get_my_todo_onloads));
		}
	}

	public function check_my_todo(){
		if (isset($_GET)) {
			$id = $_GET['id'];				
			$my_todo_checked = $this->todo_model->my_todo_chk($id);    	
			
			$get_my_todo_onloads = $this->todo_model->get_my_todo();    	
			echo(json_encode($get_my_todo_onloads));
		}
	}

	public function delete_my_todo(){
		if (isset($_GET)) {
			$id = $_GET['id'];				
			$my_todo_delt = $this->todo_model->my_todo_del($id);    	
			
			$get_my_todo_onloads = $this->todo_model->get_my_todo();    	
			echo(json_encode($get_my_todo_onloads));
		}
	}
	
	public function insert_my_todo(){
		if (isset($_GET)) {
			$todo = $_GET['todo'];
			$todo_by = $this->session->userdata['logged_in']['user_id'];
			$data =array(
				'todo' => $todo,
				'todo_by' => $todo_by
			);				
			$my_todo_ins = $this->todo_model->my_todo_insert($data);    	
			
			$get_my_todo_onloads = $this->todo_model->get_my_todo();    	
			echo(json_encode($get_my_todo_onloads));
		}
	}
	
	public function get_for_update_my_todo(){
		if (isset($_GET)) {
			$id = $_GET['id'];			
			$get_for_update = $this->todo_model->get_toUpdate_my_todo($id);    	
			echo(json_encode($get_for_update));
		}
	}
	
	public function update_my_todo_this(){
		if (isset($_GET)) {
			$id = $_GET['id'];
			$todo = $_GET['todo'];						
			$my_todo_upd = $this->todo_model->my_todo_update($id, $todo);		
			$get_my_todo_onloads = $this->todo_model->get_my_todo();    	
			echo(json_encode($get_my_todo_onloads));
		}
	}
	
	public function send_email_config(){
		if (isset($_GET)) {
			//print_r($_GET);
			$email_smtp_host = $_GET['email_smtp_host'];
			$email_smtp_user = $_GET['email_smtp_user'];
			$email_smtp_pass = $_GET['email_smtp_pass'];
			$email_smtp_port = $_GET['email_smtp_port'];
			$email_smtp_encryption = $_GET['email_smtp_encryption'];
			
			$email_smtp_pass = $this->encrypt_model->encrypt_decrypt('encrypt', $email_smtp_pass);

		    $data = array(
		    	'email' => $email_smtp_user,
		    	'password' => $email_smtp_pass,
		    	'smtp_host' => $email_smtp_host,
		    	'smtp_port' => $email_smtp_port,
		    	'smtp_encryption' => $email_smtp_encryption
		    );	
		   // print_r($data);

			$email_config = $this->user_model->update_send_email_config($data);
			if ($email_config) {
				$datas = "Updated Successfully";
			}else{
				$datas = "Updated Fails";				
			}
		    echo(json_encode($datas));					    
		}
	}
}
