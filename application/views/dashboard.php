<?php
	if (isset($this->session->userdata['logged_in'])) {
	$user = ($this->session->userdata['logged_in']['user']);
	$user_type = ($this->session->userdata['logged_in']['user_type']);
	 } else {
	    header("location: login");
	}									
?>
<html>

<head>
<style>
	.hoe-left-header {
		background: #3b73be !important;
	}
	.hoe-searchbar .search-icon {
  		left: 11px;
  		z-index: 100 !important;
		top: 18px !important;
		position: relative;
	}
	.hoe-searchbar input {
		padding-left: 25px !important;
	}
	 .buton {
        appearance: button;
        -moz-appearance: button;
        -webkit-appearance: button;
        text-decoration: none !important;; 
        font: menu; 
        color: white ;
        display: inline-block; 
        padding: 2px 8px;
		background-color: #82b440;
		border:none;
		margin:2px;
		border-radius: 4px;
	 }
	 
	 .buton a{
		text-decoration: none !important;
		color: white  !important;
		}
	.feature-item {
		text-align:center;
	}
	.section-title-area{
		text-align:center;
	}
	#task-form{
		margin-top:110px;
	}

	#task-container li, #task-form input, #task-form button{
		width:100%;
	}
	#task-form button{
		/*margin-top:20px;*/
	}
	#controls p{
		font-size: 0.8em;
	}
#controls{
	display:none;
	text-align: center;
	clear:both;
	margin-top:60px;

	background:#E4E3D5;
	padding:20px;
	border:1px solid #c8c7bb;
}
#controls p{
	display:inline-block;
	color:#666;
	font-style: italic;
}
#controls p:first-child{
	margin-right:20px;
}
#clear-all-tasks{
	clear:both;
	margin-top:20px;
	background:#999;
	border:none;
	color:#FFF;
	padding:10px 20px;
	text-transform: uppercase;
	cursor: pointer;
	font-family: 'Quicksand', sans-serif;
	transition: all 0.3s;
}
#clear-all-tasks:hover{
	background:#666;
	transition: all 0.3s;
}
	#task-container ul{
	overflow:hidden;
}
#task-container .task-headline{
	display:none;
	color:#666666;
	border-bottom:1px solid #C8C7BB;
	padding-bottom: 20px;
	margin-bottom:20px;
	font-size:1.6em;
	position: relative;
}
#task-container .task-headline:before{
	height: 1px;
	width: 100%;
	background: #FFF;
	position: absolute;
	content: " ";
	bottom: 0px;
	left: 0;
}
#task-container .nothing-message{
	background:url("../../images/logo2.png") no-repeat center 20px;
	height:160px;
	color:#666;
	background-size: 15%;
}
#task-container li{
	display:none;
	float:left;
	width:49%;
	overflow: auto;
	height:auto;
	min-height:10px;
	background:#FFF;
	display: inline-block;
	padding:20px;
	border:1px solid #CCC;
	color:#666;
	border-top:9px solid #39D1B4;
	cursor:pointer;
	margin-bottom:10px;
	margin-right:2%;
	transition: all 0.3s;
	position: relative;
}
#task-container li:nth-child(even){
	margin-right: 0;
}
#task-container li:hover{
	opacity: 0.8;
	border-top:9px solid #F0553B;
}
#task-container p{
	line-height: 1.6em;
	text-align: left;
}
#task-container li.complete{
	opacity:0.3;
	border-top:9px solid #666;
	transition: all 0.3s;

}
#task-container li.complete:before{
	background:url("../img/complete.png") no-repeat;
	position: absolute;
	top:5px;
	right:5px;
	content: "";
	width: 55px;
	height: 55px;
	background-size: 100%;
}
#task-container li.complete:hover{
	border-top:9px solid #F0553B;
	opacity:0.6;
}
#task-container li.complete p{
	text-decoration: line-through;
}
	#task-form{
	margin: 80px 0 ;
}
#task-form input{
	border:1px solid #CCC;
	height:80px;
	width:80%;
	padding-left:20px;
	font-size:20px;
	text-transform: uppercase;
	color:#666;
	float:left;
	font-family: 'Quicksand', sans-serif;
	transition: all 0.3s;
}
#task-form input:focus, #task-form input:active, #task-form button:focus, #task-form button:active{
	outline-color: #F0553B;
	outline-width: thin;
	transition: all 0.3s;
}
#task-form button{
	height:80px;
	width:19%;
	border:1px solid #CCC;
	background:#F0553B;
	font-size:20px;
	color:#FFF;
	text-transform: uppercase;
	cursor: pointer;
	font-family: 'Quicksand', sans-serif;
	transition: all 0.3s;
	position: relative;
	border-radius: 6px;
}
#task-form button:before{
	height: 1px;
	width: 100%;
	background: #ff8e7b;
	position: absolute;
	content: " ";
	top: 0px;
	left: 0;
}
#task-form button:hover{
	opacity: 0.8;
	transition: all 0.3s;
}
/*events*/
.task{
    border: 1px solid #dddddd;
    padding: 10px;
}
label{
		color:#7f7f7f;
		font-size: 12px;
	}
.table > thead > tr > th{
		border: none;
		border-bottom: 0;
	}
.row{
		padding: 12px;
	}
.heading{
		font-size: 18px;
	}
.list_block {
    border: 1px solid #dce4ea;
    padding: 15px 12px 25px;
    border-top: 3px solid #49c32c;
    margin: 0 0 20px;
}
	.related_post_sec h3 {
    
    padding-bottom: 15px;
    border-bottom: 1px solid #dce4ea;
    margin: 0 0 18px;
    font-size: 22px;
	padding-left: 3px;
}
ul {
    list-style-type: none;
    margin: 0;
	padding-left: 3px;
}
.upcoming_events li.related_post_sec.single_post {
    float: none;
    margin-bottom: 18px;
}
.upcoming_events .related_post_sec.single_post {
 
    position: relative;

}
.upcoming_events ul li {
    display: table;
  
}

.related_post_sec ul li {
    padding: 0 0 18px;
    margin: 0 0 18px;
    border-bottom: 1px solid #dce4ea;
  
    clear: both;
    width: 100%;
   
}
	.upcoming_events .related_post_sec.single_post .date-wrapper {
    position: absolute;
    top: 10px;
    left: 0;
}
	.upcoming_events .related_post_sec.single_post span.date {
    display: block;
    margin-right: 20px;
}

.upcoming_events span.date {
    font-weight: 400;
    font-size: 14px;
    color: rgba(0,0,0,0.7);
  
    padding: 5px 0;
    border: 3px solid #dce4ea;
    
    width: 70px;
    text-align: center;
   
}
	.upcoming_events .related_post_sec.single_post .rel_right {
    padding-left: 90px;
    float: left;
}
.single_post.related_post_sec h4 a {
    font-size: 18px;
    font-weight: 700;
    color: rgba(0,0,0,0.8);
    line-height: 21px;
    margin: 0 0 8px;
    text-decoration: none;
	display: table-cell;
}
.single_post.related_post_sec .meta {
    padding: 0;
    border: none;
   
}

.list_block .upcoming_events .meta {
   
    margin: 0!important;
}
.single_post.related_post_sec .meta>span {
    border: none;
}

.upcoming_events .meta span, .single-event .meta span {
    font-size: 13px;
    color: rgba(0,0,0,0.5);
    font-weight: 400;
    font-style: normal;
    line-height: 20px;
    padding-right: 0;
    margin-right: 25px;
  
}
	.upcoming_events .meta span i, .single-event .meta span i {
    font-size: 16px;
    padding-right: 10px;
}
	.meta span {
    display: inline-block; 
}
.fa-map-marker:before {
    content: "\f041";
}
	.single_post.related_post_sec .meta>span {
    border: none;
}
.fa-clock-o:before {
    content: "\f017";
}
.upcoming_events .btn {
    padding-left: 20px;
    padding-right: 20px;
    margin-top: 15px;
}

.commonBtn {
    background-color: #49c32c;
    border-color: #49c32c;
}
.commonBtn:hover {
    color: #49c32c;
    border-color: #49c32c;
	background-color: #fff;
}
.commonBtn {
    padding: 0;
    text-transform: uppercase;
    color: #fff;
    height: 42px;
    line-height: 42px;
    font-weight: 700;
}
.upcoming_events h3{
	font-weight: 700;
    color: #282428;
	}
.upcoming_events span.date span {
    font-weight: 700;
    font-size: 36px;
    display: block;
    line-height: 30px;
}
.upcoming_events .related_post_sec.single_post:hover span.date {
    color: #49c32c;
}
.upcoming_events span.date {
	text-align: center;
	}
.todo_list h3{
	font-weight: 700;
    color: #282428;
	}
.panel-body {
    padding: 15px;
}
.task-content {
    margin-bottom: 30px;
}
 .task-list {
    padding: 0;
    margin: 0;
}
 .task-list > li {
    position: relative;
    padding: 10px 5px;
    border-bottom: 1px dashed #eaeaea;
}
 .task-list li > .task-checkbox {
    float: left;
    width: 30px;
}
 .task-list li > .task-title {
    overflow: hidden;
    margin-right: 10px;
}
 .task-list li .task-title .task-title-sp {
    margin-right: 5px;
    color: black;
}
.panel-body:before, .row:after, .row:before {
    display: table;
    content: " ";
}
.features_font{
	font-size: 35px;
	font-weight: bold;
	font-style: italic;
	color: black;
	line-height: 40px;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
	 <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!--div class="preview__header">

  <div class="preview__envato-logo">
    <a href=""><img src="images/1.png" width= '166'></a>
  </div>

  <div class="preview__actions">
    <div class="preview__action--buy">
      <a <a href="index.php/welcome/logout/" class="e-btn--3d -color-primary">Logout</a>
    </div>

    <div class="preview__action--close">

      <a href="">
        <i class="e-icon -icon-cancel"></i><span></span>
</a>
    </div>
  </div>

</div-->

<body hoe-navigation-type="vertical" hoe-nav-placement="left" theme-layout="wide-layout" theme-bg="bg1">
    <div id="hoeapp-wrapper" class="hoe-hide-lpanel" hoe-device-type="desktop">
        <header id="hoe-header" hoe-lpanel-effect="shrink">
            <div class="hoe-left-header">
                <a id="hidelogo" href="#"><!--i class="fa fa-graduation-cap"></i--> <img src="<?php echo base_url();?>images/blue-logo.png"></a>
                <span class="hoe-sidebar-toggle"><a href="#"></a></span>
            </div>

            <div class="hoe-right-header" hoe-position-type="relative">
                <span class="hoe-sidebar-toggle"><a id="toggle1" href="#"></a></span>
              <ul class="left-navbar">
					<li class="dropdown hoe-rheader-submenu message-notification">
						<a href="#" class="dropdown-toggle icon-circle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="badge badge-danger">5</span>
						</a>
						<ul class="dropdown-menu ">
							<li class="hoe-submenu-label">
								<h3>You have <span class="bold">5</span> New Messages <a href="#">view all</a></h3>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									<img src="images/avatar-1.jpg" class="img-circle notification-avatar" alt="Avatar">
									<span class="notification-title">Nanterey Reslaba</span>
									<span class="notification-ago  ">3 min ago</span>
									<p class="notification-message">Hi James, Don't go anywhere, i will be coming soon. </p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									<img src="images/avatar-2.jpg" class="img-circle notification-avatar" alt="Avatar">
									<span class="notification-title">Polly Paton</span>
									<span class="notification-ago  ">5 min ago</span>
									<p class="notification-message">Hi James, Everything is working just fine here. </p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									<img src="images/avatar-3.jpg" class="img-circle notification-avatar" alt="Avatar">
									<span class="notification-title">Smith Doe</span>
									<span class="notification-ago  ">8 min ago</span>
									<p class="notification-message">Please mail me the all files when you complete your task.</p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									<img src="images/avatar-4.jpg" class="img-circle notification-avatar" alt="Avatar">
									<span class="notification-title">Zoey Lombardo</span>
									<span class="notification-ago  ">15 min ago</span>
									<p class="notification-message">Hi James, How are you?</p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									<img src="images/avatar-5.jpg" class="img-circle notification-avatar" alt="Avatar">
									<span class="notification-title">Alan Doyle</span>
									<span class="notification-ago  ">30 min ago</span>
									<p class="notification-message">Call me when you complete your work.</p>
								</a>
							</li> 
						</ul>
					</li>
					<li class="dropdown hoe-rheader-submenu message-notification left-min-30">
						<a href="#" class="dropdown-toggle icon-circle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="badge badge-success">6</span>
						</a>
						<ul class="dropdown-menu ">
							<li class="hoe-submenu-label">
								<h3><span class="bold">6 pending</span> Notification <a href="#">view all</a></h3>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									 <i class="fa fa-database red-text"></i>
									<span class="notification-title">Database overload- Sav3090</span>
									<span class="notification-ago  ">3 min ago</span>
									<p class="notification-message">Database overload due to incorrect queries</p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									  <i class="fa fa-exchange green-text"></i>   
									<span class="notification-title">Installing App v1.2.1</span>
									<span class="notification-ago  ">60 % Done</span>
									<p class="notification-message"> 
										</p><div class="progress">
											<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:60%"> 60%
											</div>
										</div>
									<p></p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									 <i class="fa fa-exclamation-triangle red-text"></i>
									<span class="notification-title">Application Error - Sav3085</span>
									<span class="notification-ago  ">10 min ago</span>
									<p class="notification-message">failed to initialize the application due to error weblogic.application.moduleexception</p>
								</a>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									 <i class="fa fa-server yellow-text"></i>
									<span class="notification-title">Server Status - Sav3080</span>
									<span class="notification-ago  ">30GB Free Space</span>
									<p class="notification-message"> 
										</p><div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" style="width:40%">
												 
											</div>
											<div class="progress-bar progress-bar-warning" role="progressbar" style="width:10%">
												 
											</div>
											<div class="progress-bar progress-bar-danger" role="progressbar" style="width:20%">
												 
											</div>
										</div>
									<p></p>
								</a>
							</li> 
							<li>
								<a href="#" class="clearfix"> 
									 <i class="fa fa-cogs green-text"></i>
									<span class="notification-title">Application Configured</span>
									<span class="notification-ago  ">30 min ago</span>
									<p class="notification-message">Your setting is updated on server Sav3060</p>
								</a>
							</li>
							<li> 
								<a href="#" class="clearfix"> 
									 <i class="fa fa-server blue-text"></i>
									<span class="notification-title">Server Status</span>
									<span class="notification-ago  ">300GB Free Space</span>
									<p class="notification-message"> 
										</p><div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" style="width:80%">
												Free Space
											</div> 
										</div>
									<p></p>
								</a>
							</li> 
							 
						</ul>
					</li> 
					<li class="dropdown hoe-rheader-submenu message-notification left-min-65">
						<a href="#" class="dropdown-toggle icon-circle" data-toggle="dropdown">
							<i class="fa fa-tasks"></i>
							<span class="badge badge-danger">4</span>
						</a>
						<ul class="dropdown-menu ">
							<li class="hoe-submenu-label">
								<h3> You have <span class="bold">4 </span>pending Task <a href="#">view all</a></h3>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									<img alt="Avatar" class="img-circle notification-avatar" src="images/avatar-1.jpg">
									<span class="notification-title"> Smith Doe Assigned new task </span>
									<span class="notification-ago-1 ">5 min ago</span>
									<p class="notification-message">Provide an Overview key mention characteristics for selected Keyword.</p>
								</a>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									<img alt="Avatar" class="img-circle notification-avatar" src="images/avatar-2.jpg">
									<span class="notification-title"> Polly Paton Done his work</span>
									<span class="notification-ago-1 ">10 min ago</span>
									<p class="notification-message">Polly Paton has completed his work. please assign her new task. </p>
								</a>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									<img alt="Avatar" class="img-circle notification-avatar" src="images/avatar-5.jpg">
									<span class="notification-title">Alan Installing App v1.2.1</span>
									<span class="notification-ago-1 ">15 min ago</span>
									<p class="notification-message"> 
										Alan Installing App v1.2.1 on server Sav3080
										</p><div class="progress">
											<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:60%"> 60%
											</div>
										</div>
									<p></p>
								</a>
							</li>
							<li>
								<a href="#" class="clearfix"> 
									<img alt="Avatar" class="img-circle notification-avatar" src="images/avatar-4.jpg">
									<span class="notification-title"> Zoey Lombardo like your task</span>
									<span class="notification-ago-1 ">20 min ago</span>
									<p class="notification-message">Zoey Lombardo like your server installation task.</p>
								</a>
							</li>
							 
						</ul>
					</li>
					<li>
						<form method="post" class="hoe-searchbar">
							<input type="text" placeholder="Search..." name="keyword" class="form-control">
							<span class="search-icon"><i class="fa fa-search"></i></span>
						</form>
					</li>
					
				</ul>	
				
                <ul class="right-navbar">
					<li class="dropdown hoe-rheader-submenu hoe-header-profile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							
                            <span style="color: #cc5200; font-size: 18px;padding-right: 10px;"> <?php echo $user_type; echo " "; echo $user; ?> <i class=" fa fa-angle-down"></i></span>
							
						</a> 
						<ul class="dropdown-menu ">
							<li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
							<li><a href="#"><i class="fa fa-calendar"></i>My Calendar</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i>My Inbox  <span class="badge badge-danger">
							3 </span></a></li>
							<li><a href="#"><i class="fa fa-rocket"></i>My Tasks <span class="badge badge-success">
							7 </span></a></li>
							<li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>
							<li><a href="#" id="logout" ><i class="fa fa-power-off"></i>Logout</a></li>
						</ul>
					</li>
					
				</ul>
				
            </div>
        </header>
        <div id="hoeapp-container" hoe-color-type="lpanel-bg5" hoe-lpanel-effect="shrink">
            <aside id="hoe-left-panel" hoe-position-type="absolute">
                <div class="profile-box">
                    <div class="media">
                        <a class="pull-left" href="">
                           
                        </a>
                        <div class="media-body">
                            
                        </div>
                    </div>
                </div>
                <ul class="nav panel-list">
                    <li class="nav-level">Navigation</li>
                    <li class="active">
                        <a href="<?php echo base_url();?>index.php/tdcelite/go_dashboard">
                            <i class="fa fa-tachometer"></i>
                            <span class="menu-text">Dashboard</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php if (isset($user_type) && ($user_type == "Lead" || $user_type == "Manager")) { ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/tdcelite/go_employee_report">
                            <i class="fa fa-line-chart"></i>
                            <span class="menu-text">Reports</span>
                            <span class="label sul">New</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php } ?>
					<li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-hand-o-up"></i>
                            <span class="menu-text">Request</span>
                            
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php if (isset($user_type) && $user_type == "Employee" ) { ?>
                    <li>
						<a href="<?php echo base_url();?>index.php/tdcelite/go_employee_timesheet">
                            <i class="fa fa-pencil-square-o"></i>
                            <span class="menu-text">Timesheet</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (isset($user_type) && ($user_type == "Lead" || $user_type == "Manager")) { ?>
					 <li>
						<a href="<?php echo base_url();?>index.php/tdcelite/go_schedule_lead">
                            <i class="fa fa-pencil-square-o"></i>
                            <span class="menu-text">Project Timesheet</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php } ?>
                     <li>
                        <a href="<?php echo base_url();?>index.php/tdcelite/go_events">
                            <i class="fa fa-calendar"></i>
                            <span class="menu-text">Events</span>                          
                            <span class="selected"></span>
                        </a>
                    </li>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>index.php/tdcelite/go_events_form">
                            <i class="fa fa-calendar-o"></i>
                            <span class="menu-text">Events Form</span>                          
                            <span class="selected"></span>
                        </a>
                    </li> 
                	<?php if (isset($user_type) && ($user_type == "Lead" || $user_type == "Manager")) { ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/tdcelite/go_approve_task">
                            <i class="fa fa-check-square-o"></i>
                            <span class="menu-text">Approve Task</span>
                          
                            <span class="selected"></span>
                        </a>
                    </li> 
                    <?php } ?>

                    <?php $user_id = $this->session->userdata['logged_in']['user_id']; $is_admin = $this->user_model->is_admin($user_id); if ($is_admin) { ?>
                    <li>
                        <a href="<?php echo base_url();?>index.php/tdcelite/go_setting_sendmail">
                            <i class="fa fa-gear fa-spin"></i>
                            <span class="menu-text">Setting Sendmail</span>
                          
                            <span class="selected"></span>
                        </a>
                    </li> 
                    <?php } ?>
                    
                </ul>
            </aside>
            <section id="main-content" style="min-height: 205px; height: 396px; overflow-y: auto;">
				<div class="content-title">
                    <h3 class="main-title">Dashboard</h3>
                    <span><?php echo date("d M, Y");?></span>
                </div>
            <div class="inner-content">
                <div id="page-wrap">
				 	<section id="features" class="section-features section-padding section-meta onepage-section">
        				<div class="container">
                			<div class="section-title-area">
	            			<h5 class="section-subtitle"></h5><!--h2 class="section-title">Features</h2--></div>
		                	<div class="section-content">
			                	<div class="col-sm-8 col-xs-12">
									<div class="list_block related_post_sec">
										<div class="todo_list">
											<h3>Todo List</h3>
											<div class="panel-body">
												<div class="task-content">
													<ul class="task-list">
														<!--  <li>
															  <div class="task-checkbox">
																  <input type="checkbox" class="list-child" value="" checked="true">
															  </div>
															  <div class="task-title">
																  <span class="task-title-sp">juyjygujkyujkyuj</span>
																  <span class="badge badge-sm label-success">2 Days</span>
																  <div class="pull-right hidden-phone">
																	  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
																	  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
																	  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
																  </div>
															  </div>
														  </li> -->
													  </ul>
												  </div>

												  <div class=" add-task-row">
													  <a class="btn btn-success btn-sm pull-left " href="#" id="add_nw_todo">Add New Todo</a>
													  <a class="btn btn-default btn-sm pull-right" href="#" onclick="getMyTodoAll()">See All Todo</a>
												  </div>
											  </div>
										</div>
									</div>
								</div>
								<div class="col-sm-4 col-xs-12">
									<div class="list_block related_post_sec">
									  <div class="upcoming_events">
										<h3>Features</h3>
										<ul>
										  <li class="related_post_sec single_post">
											<span class="date-wrapper">
											  <span class="features_font" >Activity</span>
											</span>
											<div class="rel_right">										 
												<a href="">	<img class="alignnone size-full wp-image-29" src="<?php echo base_url();?>images/performance.png" alt=""  /></a>			                    			
											</div>										
										  </li>
										  <li class="related_post_sec single_post">
											<span class="date-wrapper">
											  <span class="features_font" >Leave Management</span>
											</span>
											<div class="rel_right">										 
												<a href="">	<img class="alignnone size-full wp-image-29" src="<?php echo base_url();?>images/leave.png" alt=""  /></a>			                    			
											</div>										
										  </li>
										  <li class="related_post_sec single_post">
											<span class="date-wrapper">
											  <span class="features_font" >Performance Management</span>
											</span>
											<div class="rel_right">										 
												<a href="">	<img class="alignnone size-full wp-image-29" src="<?php echo base_url();?>images/pp.png" alt=""  /></a>			                    			
											</div>										
										  </li>
										  <li class="related_post_sec single_post">
											<span class="date-wrapper">
											  <span class="features_font">Training & Development</span>
											</span>
											<div class="rel_right">										 
												<a href="">	<img class="alignnone size-full wp-image-29" src="<?php echo base_url();?>images/dev.png" alt=""  /></a>			                    			
											</div>										
										  </li>									  
										</ul>
										<!-- <a href="" class="btn btn-default btn-block commonBtn">More Events</a> -->
									  </div>
								  </div>
							</div>
	            			</div><!-- content div place all inside this-->
	    				</div>
					</section>
				</div>   
            </div>  
			<!-- <section id="task-form">
				<input id="create-task" type="text" name="task-insert" placeholder="Insert your list items here">
				<button id="create-task">Create List</button>
			</section> -->
			<!-- <section id="task-container">
				<ul id="task-list">
				  <h3 class="nothing-message">No list yet</h3>
				  <h3 class="task-headline">Today's Tasks</h3>
				</ul>
			   <div id="controls">
				  <button id="clear-all-tasks">Clear All Tasks</button>
			   </div>
		   </section> -->
       </section>
			
        </div>
    </div>

</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>js/1.11.2.jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/switch.js"></script>
    <script src="<?php echo base_url();?>js/hoe.js"></script>
	<script src="<?php echo base_url();?>js/app.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script>
      //function to fix height of iframe!
      var calcHeight = function() {
        var headerDimensions = $('.preview__header').height();
        $('.full-screen-preview__frame').height($(window).height() - headerDimensions);
      }

      $(document).ready(function() {
        calcHeight();
      });

      $(window).resize(function() {
        calcHeight();
      }).load(function() {
        calcHeight();
      });
</script>
<script >
    	$(document).ready(function() {
	        $("#logout").click(function(){
			    window.location.href='<?php echo base_url();?>index.php/tdcelite/logout';
			});		
      	});    	
</script>
   


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
$(document).ready(function(){
    $("#toggle1").click(function(){
        $("#hidelogo").toggle();
    });
    
    $("#add_nw_todo").click(function(){
    	if (document.getElementById('Add_New_form')) {console.log("already present");}else{
        var $li = $('<li class="rm" id="Add_New_form">').append(                                            
			$("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' disabled></div><div class='task-title'><span class='task-title-sp'><input class='form-control' type='text' id='add_form_todo' /></span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' style='margin-top: 10px;' onclick='add_todo()'><i class='fa fa-plus-square'></i>&nbsp;Add</button></div></div></li>")
			).appendTo('.task-list');
    	}
    });
});
</script>
<script>
    $(document).ready(function(){     	
     	$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/get_my_todo_onload?onload= true',
            success: function(data){             
                //alert("data:" + data);    
                var response = JSON.parse(data);
                $(".task-list .rm").remove();
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' "+item.todo_checked+" disabled></div><div class='task-title'><span class='task-title-sp'>"+item.todo+"</span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' id='"+item.id+"' onclick='check_todo(this.id)'><i class='fa fa-check'></i></button>&nbsp;<button class='btn btn-primary btn-xs' id='"+item.id+"' onclick='edit_todo(this.id)'><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger btn-xs' id='"+item.id+"' onclick='delete_todo(this.id)'><i class='fa fa-trash-o'></i></button></div></div></li>")
				    ).appendTo('.task-list');				                      
                });
            }
        });
    });
 </script> 
<script>
	function check_todo(id){
		//alert("Checked");
		$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/check_my_todo?id='+id+'',
            success: function(data){             
                //alert("data:" + data);                   
                var response = JSON.parse(data);
                $(".task-list .rm").remove();
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' "+item.todo_checked+" disabled></div><div class='task-title'><span class='task-title-sp'>"+item.todo+"</span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' id='"+item.id+"' onclick='check_todo(this.id)'><i class='fa fa-check'></i></button>&nbsp;<button class='btn btn-primary btn-xs' id='"+item.id+"' onclick='edit_todo(this.id)'><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger btn-xs' id='"+item.id+"' onclick='delete_todo(this.id)'><i class='fa fa-trash-o'></i></button></div></div></li>")
				    ).appendTo('.task-list');				                      
                });  
                toastr.info('Todo Marked as checked.', 'Information', {timeOut: 5000})                          
            }
        });
	}

	function edit_todo(id){
		//alert("edit");
		//alert("id"+ id);		
		toastr.info('Please! Scroll to bottum.', 'Information', {timeOut: 5000})
		$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/get_for_update_my_todo?id='+id+'',
            success: function(data){             
                //alert("data:" + data);    
                var response = JSON.parse(data);                
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' disabled></div><div class='task-title'><span class='task-title-sp'><input class='form-control' type='text' id='update_form_todo' value='"+item.todo+"' /></span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' style='margin-top: 10px;' id='"+item.id+"' onclick='udate_this_todo(this.id)'><i class='fa fa-plus-square'></i>&nbsp;Update</button></div></div></li>")
				    ).appendTo('.task-list');				                      
                });                            
            }
        });
	}
	
	function udate_this_todo(id){
		//alert("udate_this_todo id"+ id);
		var todo = document.getElementById('update_form_todo').value;
		//alert("udate_this_todo todo"+ todo);

		$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/update_my_todo_this?id='+id+' &todo='+todo+'',
            success: function(data){             
               // alert("data:" + data);    
                  
                var response = JSON.parse(data);
                $(".task-list .rm").remove();
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' "+item.todo_checked+" disabled></div><div class='task-title'><span class='task-title-sp'>"+item.todo+"</span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' id='"+item.id+"' onclick='check_todo(this.id)'><i class='fa fa-check'></i></button>&nbsp;<button class='btn btn-primary btn-xs' id='"+item.id+"' onclick='edit_todo(this.id)'><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger btn-xs' id='"+item.id+"' onclick='delete_todo(this.id)'><i class='fa fa-trash-o'></i></button></div></div></li>")
				    ).appendTo('.task-list');				                      
                }); 
                toastr.success('Todo updated.', 'Success Alert', {timeOut: 5000})                           
            }
        });
	}
	
	function getMyTodoAll(){
		//alert("All todo");
		$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/get_my_todo_all?all_todo=true',
            success: function(data){             
                //alert("data:" + data);    
                toastr.info('Showing all Todos', 'Information', {timeOut: 5000})  
                var response = JSON.parse(data);
                $(".task-list .rm").remove();
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' "+item.todo_checked+" disabled></div><div class='task-title'><span class='task-title-sp'>"+item.todo+"</span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' id='"+item.id+"' onclick='check_todo(this.id)'><i class='fa fa-check'></i></button>&nbsp;<button class='btn btn-primary btn-xs' id='"+item.id+"' onclick='edit_todo(this.id)'><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger btn-xs' id='"+item.id+"' onclick='delete_todo(this.id)'><i class='fa fa-trash-o'></i></button></div></div></li>")
				    ).appendTo('.task-list');				                      
                });                            
            }
        });
	}

	function add_todo(){
		//alert("todo is : "+ document.getElementById('add_form_todo').value);
		var todo = document.getElementById('add_form_todo').value;
		$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/insert_my_todo?todo='+todo+'',
            success: function(data){             
                //alert("data:" + data);    
                toastr.success('New Todo added', 'Success Alert', {timeOut: 5000})    
                var response = JSON.parse(data);
                $(".task-list .rm").remove();
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' "+item.todo_checked+" disabled></div><div class='task-title'><span class='task-title-sp'>"+item.todo+"</span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' id='"+item.id+"' onclick='check_todo(this.id)'><i class='fa fa-check'></i></button>&nbsp;<button class='btn btn-primary btn-xs' id='"+item.id+"' onclick='edit_todo(this.id)'><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger btn-xs' id='"+item.id+"' onclick='delete_todo(this.id)'><i class='fa fa-trash-o'></i></button></div></div></li>")
				    ).appendTo('.task-list');				                      
                });                            
            }
        });
	}

	function delete_todo(id){
		//alert("delete");
		toastr.warning('deleting Todo...', 'Warning', {timeOut: 5000})
		if (confirm("Do you wants to delete?")) { console.log("deleting...");}else{ return false;}
		$.ajax({
            type: "GET",
            url: '<?php echo base_url();?>index.php/tdcelite/delete_my_todo?id='+id+'',
            success: function(data){             
               // alert("data:" + data);    
                var response = JSON.parse(data);
                $(".task-list .rm").remove();
                $.each(response, function(i, item) {
                	var $li = $('<li class="rm">').append(                                            
				        $("<li class='rm'><div class='task-checkbox'><input type='checkbox' class='list-child' value='' "+item.todo_checked+" disabled></div><div class='task-title'><span class='task-title-sp'>"+item.todo+"</span><div class='pull-right hidden-phone'><button class='btn btn-success btn-xs' id='"+item.id+"' onclick='check_todo(this.id)'><i class='fa fa-check'></i></button>&nbsp;<button class='btn btn-primary btn-xs' id='"+item.id+"' onclick='edit_todo(this.id)'><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger btn-xs' id='"+item.id+"' onclick='delete_todo(this.id)'><i class='fa fa-trash-o'></i></button></div></div></li>")
				    ).appendTo('.task-list');				                      
                }); 
                toastr.error('Todo deleted', '!', {timeOut: 5000})                           
            }
        });
	}
</script>
</body>
</html>