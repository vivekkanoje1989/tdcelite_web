<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Simple Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/snmpc.css"  type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet' type='text/css'>
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main">
		<h1></h1>
		<div class="main-row">
			<div class="agileits-top"> 
				<p style="font-style: italic;color: orange; ">Enter your registered email id</p>
				<?php echo form_open('tdcelite/forgot_password'); ?>	
					
					<?php $data = array(
							'name'          => 'emailid',
							'class'         => 'text',
							'id'            => 'username',
							'value'         => '',
							'maxlength'     => '100',
							'size'          => '50px',
							'style'         => 'width:90%',
							'placeholder'   => 'Email Id',
							'required'      => 'true'
							
					); 
            echo form_input($data); ?>
			
					<input type="submit" value="Get Password">
				<?php echo form_close(); ?>
			<?php	if (isset($message_display)) { ?>
					<p><a href="<?php echo base_url();?>index.php/tdcelite">Login</a></p>
			<?php } ?>
				
			</div>	 
			<?php
		echo "<div class='my_message'>";
		if (isset($error_message)) {
		echo $error_message;
		}
		echo validation_errors();
		echo "</div>";
	?>
	
	<?php
		if (isset($message_display)) {
		echo "<div class='my_message'>";
		echo $message_display;
		echo "</div>";
	}
	?>
		</div>	
		<!-- copyright -->
		<div class="copyright">
			<p></p>
		</div>
		<!-- //copyright -->
	</div>	
	<!-- //main --> 
</body>
</html>