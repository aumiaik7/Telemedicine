<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>User Registration</title>
	<meta name="description" content="flexi auth, the user authentication library designed for developers."/> 
	<meta name="keywords" content="demo, flexi auth, user authentication, codeigniter"/>
	<?php $this->load->view('includes/head'); ?> 
</head>

<body id="register">

<div id="body_wrap">
	<!-- Header -->  
	<?php $this->load->view('includes/header_1'); ?> 

	<!-- Demo Navigation -->
	<?php $this->load->view('includes/menubar'); ?> 
	
	<!-- Intro Content -->
   
    <div class="content_wrap intro_bg">
		<div class="content clearfix"> 
			<div class="intro_text">
				<h1>Telemedicine Project</h1>
                <div align="right"> <label class="a"> <?php echo $this->session->userdata('hello') .  $this->session->userdata('uname') . "!" ?></label>
                </div>			
				<p class="a">It is an initiative to provide quality health service to the rural areas of Bangladesh</p>
				<p></p>
			</div>		
		</div>
	</div>
	
	<!-- Main Content -->
	<div class="content_wrap main_content_bg">
		<div class="content clearfix">
			<div class="col100">
				<h2>Register Account</h2>

			<?php if (! empty($message)) { ?>
				<div id="message">
					<?php echo $message; ?>
				</div>
			<?php } ?>
				
				<?php echo form_open(current_url()); ?>  	
					<fieldset>
						<legend>Personal Details</legend>
						<ul>
							<li class="info_req">
								<label for="first_name">First Name:</label>
								<input type="text" id="first_name" name="register_first_name" value="<?php echo set_value('register_first_name');?>"/>
							</li>
							<li class="info_req">
								<label for="last_name">Last Name:</label>
								<input type="text" id="last_name" name="register_last_name" value="<?php echo set_value('register_last_name');?>"/>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend>Contact Details</legend>
						<ul>
							<li class="info_req">
								<label for="phone_number">Phone Number:</label>
								<input type="text" id="phone_number" name="register_phone_number" value="<?php echo set_value('register_phone_number');?>"/>
							</li>
						
						</ul>
					</fieldset>
					
					<fieldset>
						<legend>Login Details</legend>
						<ul>
							<li class="info_req">
								<label for="email_address">Email Address:</label>
								<input type="text" id="email_address" name="register_email_address" value="<?php echo set_value('register_email_address');?>" />
							</li>
							<li class="info_req">
								<label for="username">Username:</label>
								<input type="text" id="username" name="register_username" value="<?php echo set_value('register_username');?>" class="tooltip_trigger"
									title="Set a username that can be used to login with."
								/>
							</li>
							
							<li class="info_req">
								<label for="password">Password:</label>
								<input type="password" id="password" name="register_password" value="<?php echo set_value('register_password');?>"/>
							</li>
							<li class="info_req">
								<label for="confirm_password">Confirm Password:</label>
								<input type="password" id="confirm_password" name="register_confirm_password" value="<?php echo set_value('register_confirm_password');?>"/>
							</li>
						</ul>
					</fieldset>
					
					<fieldset>
						<legend>Register</legend>

						<ul>
							
							<li>
								<hr/>
								<label for="submit">Register:</label>
								<input type="submit" name="register_user" id="submit" value="Submit" class="link_button large"/>
							</li>
						</ul>
					</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>	
	
	<!-- Footer -->  
	<?php $this->load->view('includes/footer'); ?> 
</div>

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

</body>
</html>